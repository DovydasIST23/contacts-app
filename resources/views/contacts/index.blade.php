@extends('layouts.contact')

@section('title', 'Kontaktu sąrašas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 style="color:magenta; font-size:200%">Kontaktu sąrašas</h2>
        <a style="color:blue;" href="{{ route('contacts.create') }}" class="btn btn-success">Pridėti kontakta</a><br>
        <a style="color:red;" href="{{ route('contacts.trashed') }}" class="btn btn-success">Rodyti pašalintus</a><br>
        <a style="color:green;" href="{{ route('submitG.form') }}" class="btn btn-success">Suisti Email</a>
    </div><br>

    @if(session('success'))
        <div style="color: green">{{ session('success') }}</div>
    @endif

    <table class="table table-striped" style="border-collapse: collapse; border: 2px solid black;">
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 5px;">ID</th>
                <th style="border: 1px solid black; padding: 5px;">Vardas</th>
                <th style="border: 1px solid black; padding: 5px;">Email</th>
                <th style="border: 1px solid black; padding: 5px;">Telefonas</th>
                <th style="border: 1px solid black; padding: 5px;">Veiksmai</th> <!-- Added Actions column header -->
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td style="border: 1px solid black; padding: 5px;">{{ $contact->id }}</td>
                    <td style="border: 1px solid black; padding: 5px;">{{ $contact->name }}</td>
                    <td style="border: 1px solid black; padding: 5px;">{{ $contact->email }}</td>
                    <td style="border: 1px solid black; padding: 5px;">{{ $contact->phone }}</td>
                    <td style="border: 1px solid black; padding: 5px;">
                        <a style="color:cyan;" href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary btn-sm">✐Redaguoti✐</a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button style="color:orange;" type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Ištrinti</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $contacts->links() }} <!-- Pagination -->
@endsection