@extends('layouts.master')

    @section('content')
        <div class="container">
			<div class="table_block_main">
                <div class="top_table_head">
                    <h3>Add product</h3>  
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form_block_main">
                            <form method="post" enctype="multipart/form-data" action="{{ route('products.store') }}">
                                @csrf
                                <div class="col-sm-12">
                                    <label class="title_my">Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
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
                                        <input type="text" class="form-control" name="code" value="{{ old('code') }}">
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
                                        <input type="text" class="form-control" name="price" value="{{ old('price') }}">
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
                                        <textarea class="form-control" rows="3" name="description">{{ old('description') }}</textarea>
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