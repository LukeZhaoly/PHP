<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagCreateRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    protected $fields=[
        'tag' => '',
        'title' => '',
        'subtitle' => '',
        'meta_description' => '',
        'page_image' => '',
        'layout' => 'blog.layouts.index',
        'reverse_direction' => 0,
    ];

    //获取所有的标签
    public function index(){
        $tags=Tag::all();
        return view('admin.tag.index')->with('tags',$tags);
    }

    //新增一个标签
    public function create(){
        $data=[];
        foreach ($this->fields as $field=>$default){
            $data[$field]=old($field,$default);
        }
        return view('admin.tag.create',$data);
    }

    //保存标签
    public  function  store(TagCreateRequest $request){
        $tag=new Tag();
        foreach (array_keys($this->fields) as $field){
            $tag->$field=$request->get($field);
        }
        $tag->save();
        return redirect('admin/tag')->with('success','标签['.$tag->tag.']创建成功');
    }

    //跳转编辑页面
    public function edit($id){
        $tag=Tag::findOrFail($id);
        $data=['id'=>$id];
        foreach (array_keys($this->fields) as $field){
            $data[$field]=$tag->$field;
        };
        return view('admin.tag.edit')->with($data);
    }

    //修改保存
    public function update(TagUpdateRequest $request,$id){
        $tag=Tag::findOrFail($id);
        foreach (array_keys($this->fields) as $field){
            $tag->$field=$request->get($field);
        }
        $tag->update();
        return redirect('admin/tag')->with('success','标签['.$tag->tag.']修改成功');
    }

    //删除标签
    public function destroy($id){
        $tag=Tag::findOrFail($id);
        $tag->delete();
        return redirect('admin/tag')->with('success','标签['.$tag->tag.']修改成功');
    }
}
