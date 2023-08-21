<?php

namespace App\Http\Livewire;

use App\Models\QuestionaryImage;
use App\Models\Quotation;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddPhotos extends Component
{
    use WithFileUploads;

    public $Quotation_Id, $photo = null;

    public function mount($Quotation_Id){
        $this->Quotation_Id = $Quotation_Id;
    }

    public function render()
    {
        $Quotations = Quotation::find($this->Quotation_Id);

        return view('livewire.add-photos', compact('Quotations'));
    }

    public function save()
    {
        $Quotation_Id = $this->Quotation_Id;

        $customFileName = uniqid() . '_' . date('Y-m-d') . '.' . $this->photo->extension();
        $ruta = $_SERVER['DOCUMENT_ROOT'].('/img/photos/');
        copy($this->photo->getRealPath(),$ruta.$customFileName);

        $photo = new QuestionaryImage();
        $photo->quotation_id = $Quotation_Id;
        $photo->image = 'photos/'. $customFileName;
        // $photo->save();

        return redirect()->route('addphotos', $Quotation_Id);
    }
}
