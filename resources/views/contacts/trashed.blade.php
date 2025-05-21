@extends('layouts.contact')

@section('title', 'Ištrinti kontaktai')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Ištrinti kontaktai</h2>
            <a href="{{ route('contacts.index') }}" class="btn btn-primary">Grįžti į studentų sąrašą</a>
        </div>

        @if (session('success'))
            <div style="color: green">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Vardas</th>
                    <th>Email</th>
                    <th>Telefonas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>
                            <form action="{{ route('contacts.restore', $contact->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Atkurti</button>
                            </form>

                            <form action="{{ route('contacts.forceDelete', $contact->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Ar tikrai norite visiškai ištrinti?')">Ištrinti visam laikui</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $contacts->links() }} <!-- Pagination -->
    </div>
@endsection