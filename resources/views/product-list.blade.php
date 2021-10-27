@extends('layouts.master')

    @section('content')
		<div class="container">
			<div class="table_block_main">
		  			<div class="top_table_head">
		  				<h3>List</h3>  
						<a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
		  			</div>
                      @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
		  			<div class="table table-responsive">	
		  				<table id="example" class="table table-bordered my_table">
				        <thead>
				            <tr> 
                                <th>Id</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Action</th>
				            </tr>
				        </thead>
				        <tbody>
                            @foreach($products as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $row->user->name }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->code }}</td>
                                    <td>{{ $row->description }}</td>
                                    <td>{{ $row->price }}</td>
                                    <td>@if($row->image!=NULL) <img src="{{ asset($row->image) }}" height="100" width="100"> @endif</td>
                                    <td>
                                        <div class="option_div">
                                            @if(Auth::user()->id == $row->user_id)
                                                <a href="{{ URL::to('products/'.$row->id. '/edit') }}"><button type="button" class="btn btn-primary Edit"><i class="fa fa-pencil"></i></button></a>

                                                <form action="{{ URL::to('products/'.$row->id)}}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger Delete"><i class="fa fa-trash"></i></button>
                                                </form>
                                            @endif

                                                <a href="{{ route('inquiry.form', $row->id) }}"><button type="button" class="btn btn-primary">Inquiry</button></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
				        </tbody>
				    </table>
                </div>
            </div>
		</div>