<?php

namespace App\Livewire\Setting\Profile\Partials;

use App\Helpers\Upload;
use App\Models\Accounts\UserDetails;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class UploadNewProfileImage extends Component
{
    use LivewireAlert, WithFileUploads;
    public $user, $account;
    public $image;
    public $showModalImage = 0;

    public $listeners = [
        'refreshNavbar' => '$refresh',
        'imageSelectedProfile' => 'uploadfiletoServer',
    ];

    public function render()
    {
        return view('livewire.setting.profile.partials.upload-new-profile-image');
    }

    public function shouldRender()
    {
        // Periksa state komponen Anda dan tentukan apakah perlu dirender ulang.
        return $this->stateHasChanged();
    }

    private function uploadProfile($image)
    {
        $image_parts = explode(';base64,', $image);
        // $image_type_aux = explode('image/', $image_parts[0]);
        // $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $filename = 'FILE_PROFILE_' . date('Ymd') . '_' . time() . '.png';
        $filelocation = 'images/user-profile/';

        Storage::disk('public')->put($filelocation . $filename, $image_base64);

        return url('/') . '/storage/' . $filelocation . $filename;
    }

    public function updatedImage()
    {
        $image = $this->image;
        $file_extension = $image->getClientOriginalExtension();
        if (in_array($file_extension, ['jpg', 'jpeg', 'png'])) {
            $this->showModalImage = 1;
            $this->dispatch('imageSelected', $this->image->getRealPath());
        }
    }

    public function closeModal()
    {
        $this->showModalImage = 0;
    }

    public function uploadfiletoServer($image)
    {
        // $filelocation = $this->uploadProfile($image);
        $user = Auth::user();
        $Upload = Upload::toUpload($image, 'profile_user');
        $filelocation = $Upload['filelocation'];

        UserDetails::where([
            'id' => $user->id_user_details
        ])->update([
            'avatar' => $filelocation
        ]);

        $alert = [
            'status' => 'success',
            'title' => '',
            'message' => 'Success update profile image!',
        ];

        $this->setToast($alert['status'], $alert['title'], $alert['message']);
        $this->reset();
        $this->dispatch('setting:profileImageUpdated');
    }

    public function setToast($status, $title, $message)
    {
        return $this->alert($status, $title, [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => $message,
        ]);
    }
}
