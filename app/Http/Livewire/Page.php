<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Page extends Component
{
    public $pages, $title, $body, $published, $page_id, $current_page;
    public $isOpen = 0;

    public function mount($id=false)
    {
        $this->current_page = $id;

    }
    public function render()
    {

        $this->pages = \App\Models\Page::where('id', '=', $this->current_page)
            ->get();
        return view('livewire.page');

    }

    public function openModal()
    {
        $this->isOpen = true;
    }


    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->title = '';
        $this->body = '';
        $this->published = '1';
        $this->page_id = '';
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required',
            'published' => 'required'
        ]);

        \App\Models\Page::updateOrCreate(['id' => $this->page_id], [
            'title' => $this->title,
            'body' => $this->body,
            'published' => $this->published,
            'user_id' => Auth::user()->id
        ]);

        session()->flash('message',
            $this->page_id ? 'Page Updated Successfully.' : 'Page Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $page = \App\Models\Page::findOrFail($id);
        $this->page_id = $id;
        $this->title = $page->title;
        $this->body = $page->body;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        \App\Models\Page::find($id)->delete();
        session()->flash('message', 'Page Deleted Successfully.');
        redirect('/pages');
    }

}
