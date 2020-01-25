{{-- Main page for users with advanced administrative rights --}}

@extends('layouts.app')

@section('content')

<main role="main" class="container">

  <div class="starter-template">

    @include('common.errors')

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
                <td>  
                  <form action="{{ url('/admin/'. $contact->id . '/edit') }}" method="POST">
                    @csrf

                    <button type="submit" class="btn btn-outline-success EditBtn">Редактировать</button>
                  </form>
                </td>

                <td>
                  <form action="{{ url('/admin/' . $contact->id) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-outline-danger DeleteBtn_{{ $contact->id }}">Удалить</button>
                  </form>
                </td>
              </tr>
            
            @endforeach

          </tbody>
        </table>
      </div>

      {{ $contacts->links() }}

    @endif

    <form action="{{ url('admin') }}" method="POST">
      @csrf
      <table>
        <tbody>
            <tr>
              <td></td>
              <td><input type="text" name="firstNameInput" class="form-control" placeholder="Наименование"></td>
              <td><input type="text" name="secondNameInput" class="form-control" placeholder="Подразделение"></td>
              <td><input type="text" name="positionInput" class="form-control" placeholder="Должность"></td>
              <td><input type="text" name="phoneNumberInput" class="form-control" placeholder="Номер телефона"></td>
              <td><input type="text-area" name="noteInput" class="form-control" placeholder="Примечание"></td>
              <td><button type="submit" class="btn btn-outline-success">Добавить</button></td>
            </tr>
        </tbody>
      </table>
    </form>
    {{-- {{ dd(Auth::user()->name)}} --}}
  </div>
</main>
  
@endsection