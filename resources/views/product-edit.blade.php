@extends('layouts.master')

    @section('content')
        <div class="container">
			<div class="table_block_main">
                <div class="top_table_head">
                    <h3>Edit product</h3> 
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form_block_main">
                            <form method="POST" enctype="multipart/form-data" action="{{ URL::to('products/'.$product->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                                <div class="col-sm-12">
                                    <label class="title_my">Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $product->name }}">
                                        @error('name')
                                        <span style="width: 100%; margin-top: .25rem;font-size: 80%; color: #dc3545;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label class="title_my"> Code</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="code" value="{{ old('code') ? old('code') : $product->code }}">
                                        @error('code')
                                        <span style="width: 100%; margin-top: .25rem;font-size: 80%; color: #dc3545;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label class="title_my"> Price</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="price" value="{{ old('price') ? old('price') : $product->price }}">
                                        @error('price')
                                        <span style="width: 100%; margin-top: .25rem;font-size: 80%; color: #dc3545;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label class="title_my"> Image</label>
                                    <div class="form-group">
                                        @if($product->image!=NULL)
                                            <img src="{{ asset($product->image) }}" height="100" width="100">
                                        @endif
                                        <input type="file" class="form-control" name="image">
                                        @error('image')
                                        <span style="width: 100%; margin-top: .25rem;font-size: 80%; color: #dc3545;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label class="title_my"> Description</label>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="description">{{ old('description') ? old('description') : $product->description }}</textarea>
                                        @error('description')
                                        <span style="width: 100%; margin-top: .25rem;font-size: 80%; color: #dc3545;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="my_button"> 
                                        <button type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>