<?php

namespace App\Http\Livewire;

use http\Env\Request;
use Livewire\Component;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;

class Pages extends Component
{
    public $pages, $title, $body, $published, $page_id;
    //public $viewAll = 0;
    public $title_filter;
    public $isOpen = 0;

    public $viewAll = 'on';
    public $viewPublished = 'off';

    public function render()
    {
        if($this->viewAll == 0){
            $this->pages = Page::where('user_id', Auth::user()->id)
                ->where('title', 'like', '%' . $this->title_filter. '%')
                ->get();
        } else {
            $this->pages = Page::where('user_id', Auth::user()->id)
                ->where('title', 'like', '%' . $this->title_filter. '%')
                ->get();
        }


        return view('livewire.page');
    }


    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
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
        $this->page_id = '';
    }
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required',
            'published' => 'required'
        ]);

        Page::updateOrCreate(['id' => $this->page_id], [
            'title' => $this->title,
            'body' => $this->body,
            'published' => $this->published,
            'user_id' => Auth::user()->id
        ]);

        session()->flash('message',
            $this->page_id ? 'Pages Updated Successfully.' : 'Pages Created Successfully.');

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
        $page = Post::findOrFail($id);
        $this->page_id = $id;
        $this->title = $page->title;
        $this->body = $page->body;
        $this->published = $page->published;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Page::find($id)->delete();
        session()->flash('message', 'Pages Deleted Successfully.');
    }
}
