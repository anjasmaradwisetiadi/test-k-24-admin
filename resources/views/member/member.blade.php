@extends('layouts.main')
@push('styles')
    <link href="{{ asset('css/member/member.css') }}" rel="stylesheet">
@endpush

@section('container')
<div id="Member" class="mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <h3>Member</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @include('components.message-alert')
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <a href="/member/create" class="add-new-counter-link" > <button type="button" class="button-style-primary"> Add Member </button> </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" >No.</th>
                        <th scope="col" >Name</th>
                        <th scope="col" >Email</th>
                        <th scope="col" >Gender</th>
                        <th scope="col" >Posiiton</th>
                        <th scope="col" >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($users))
                    @foreach ($users as $user)
                    <tr scope="row">
                        <td> 
                            <div class="elipsis"> 
                                    {{(10 * ($users->currentPage() - 1)) + $loop->iteration}}.
                            </div>
                        </td>
                        <td> 
                            <div class="elipsis"> {{$user->name}}</div>
                        </td>
                        <td>
                            <div class="elipsis">
                                {{$user->email}}
                            </div>
                        </td>
                        <td>
                            <div class="elipsis">
                                {{$user->gender}}
                            </div>
                        </td>
                        <td>
                            <div class="elipsis" >
                                {{$user->position}}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex action-pointer justify-content-center">
                                <a href="/member/{{$user->id}}" class="add-new-counter-link mr-2">
                                    <button class="button-style-primary">
                                        <span class="material-icons pointer">
                                            visibility
                                        </span>
                                    </button>
                                </a>
                                <a href="/member/{{$user->id}}/edit" class="add-new-counter-link mr-2">
                                    <button class="button-style-primary">
                                        <span class="material-icons pointer">
                                            edit
                                        </span>
                                    </button>
                                </a>
                                <a class="add-new-counter-link">
                                    <form action="/member/{{$user->id}}" method="post" style="display: inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="button-style-primary" onclick="return confirm('Are you Sure want delete it ?')"> 
                                            <span class="material-icons pointer">
                                                delete
                                            </span>
                                        </button>
                                    </form>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                    @if(!isset($users))
                    <tr>
                        <td colspan="6">
                            <div class="d-flex justify-content-center">
                                Data not record
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
                @if(isset($users))
                <tfoot>
                    <th colspan="6">
                        <div class="row" v-if="dataDeckBuilders?.data?.length">
                            <div class="col">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </th>
                </tfoot>
                @endif
            </table>
        </div>
    </div>
</div>
@endsection