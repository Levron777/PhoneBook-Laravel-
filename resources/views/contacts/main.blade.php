{{-- The main page for unauthorized users with minimal functionality --}}

@extends('layouts.app')

@section('content')
    
<main role="main" class="container">

  <div class="starter-template">
    <h1>Телефонный справочник сотрудников ОАО "РЖД"</h1>

    @if (count($contacts) > 0)

      <div class="table-responsive-sm">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Наименование</th>
              <th scope="col">Подразделение</th>
              <th scope="col">Должность</th>
              <th scope="col">Номер телефона</th>
              <th scope="col">Примечание</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($contacts as $contact)
              <tr>
                <td>{{ $contact->firstName }}</td>
                <td>{{ $contact->secondName }}</td>
                <td>{{ $contact->position }}</td>
                <th>{{ $contact->phoneNumber }}</th>
                <td>{{ $contact->note }}</td>
              </tr>
            @endforeach

          </tbody>
        </table>
      </div>

      {{ $contacts->links() }}

    @endif
  
  </div>

</main>

@endsection