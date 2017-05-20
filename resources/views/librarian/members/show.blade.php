@extends('layouts.master')

@section('pg-title', 'Member Profile')
@section('pg-head-left', 'Member: ' . $member->name)

@section('content')
    <div class="row">
        <div class="col-md-7">
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Member Code</strong>
                    <span class="pull-right">{{ $member->code ? : 'XXXXX' }}</span>
                </li>
                <li class="list-group-item">
                    <strong>Residence</strong>
                    <span class="pull-right">{{ $member->address }}</span>
                </li>
                <li class="list-group-item">
                    <strong>Mobile No.</strong>
                    <span class="pull-right">{{ $member->phone ? : 'xxxxxxxxxxx' }}</span>
                </li>
                <li class="list-group-item">
                    <strong>Member Type</strong>
                    <span class="pull-right">{{ ucwords($member->type) }}</span>
                </li>
                <li class="list-group-item">
                    <strong>Member Status</strong>
                    <span class="pull-right">{{ $member->status ? 'Active' : 'Suspended' }}</span>
                </li>
                <li class="list-group-item">
                    <strong>Member Gender</strong>
                    <span class="pull-right">{{ ucwords($member->gender) }}</span>
                </li>
                <li class="list-group-item">
                    <strong>Joined At</strong>
                    <span class="pull-right">{{ $member->created_at->format('M d, Y') }}</span>
                </li>
            </ul>    
        </div>
        <div class="col-md-5 text-center" style="padding-left: 70px;">
            <img src="{{ $member->avatar_url() }}" class="img-responsive img-rounded" alt="{{ $member->name }}" width="260">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover dataTable datatable">
                <thead>
                    <tr class="active">
                        <th>#</th>
                        <th>Book Title</th>
                        <th>Author Name</th>
                        <th>Book Location</th>
                        <th>Copies</th>
                        <th>Borrow Date</th>
                        <th>Return Date</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($member->borrows))
                @foreach($member->borrows as $key => $borrow)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $borrow->book->title }}</td>
                        <td>{{ $borrow->book->author->name }}</td>
                        <td>{{ $borrow->book->location ? : 'no location' }}</td>
                        <td>{{ $borrow->copies }}</td>
                        <td>{{ $borrow->borrow_date->format('M d, Y') }}</td>
                        <td>{{ $borrow->return_date ? $borrow->return_date->format('M d, Y') : 'not returned' }}</td>
                    </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="7">
                            <p class="text-center" style="font-size: large;">
                                no book borrowed from library by this member
                            </p>
                        </td>
                    </tr>
                @endif    
                </tbody>
            </table>    
        </div>
    </div>
@stop

@section('scripts')
    @if(count($member->borrows))
        @include('layouts.partials.datatable', [
            'columns' => "0, 1, 2, 3, 4, 5, 6",
            'heading' => "Books borrowed by $member->name"
        ])
    @endif  
@stop