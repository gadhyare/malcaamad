<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Settings;
use Livewire\Component;
use Livewire\WithFileUploads;

class MangeLogo extends Component
{

    use WithFileUploads;

    public $logo ;
    public function render()
    {
        $info = Settings::first();
        return view('livewire.admin.settings.mange-logo' , ['info' => $info] );
    }




    public function uploadlogo(){
        $this->validate([
            'logo' => 'required|image|max:1024'
        ]);
        $fileName = 'logo-'.time() . '.' . $this->logo->extension();
        $this->logo->storeAs('public/images/' , $fileName);
        $data = Settings::first();
        $data->logo = $fileName;
        $data->update();
    }
}
