@extends('layouts.master')

    @section('content')
        <div class="container">
			<div class="table_block_main">
                <div class="top_table_head">
                    <h3>Inquiry</h3>  
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form_block_main">
                            <form method="post" action="{{ route('inquiry.store') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ request()->id }}">
                                
                                <div class="col-sm-12">
                                    <label class="title_my"> Product query</label>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="product_query">{{ old('query') }}</textarea>
                                        @error('product_query')
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