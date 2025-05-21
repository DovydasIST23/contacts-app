@extends('layouts.contact')
@section('content')
<div class="container">
    <h2>Contact List</h2>
    @if(session('success'))
        <div style="color: green">{{ session('success') }}</div>
    @endif
    <ul>
        @foreach($contacts as $contact)
            <li>
                {{ $contact->name }} - {{ $contact->phone }} - {{ $contact->email }}   
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')" style="color:red">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
    @auth
        <a href="{{ route('contacts.create') }}">Add New Contact</a>
    @endauth
</div>
@endsection

