{{-- The page for editing the selected row from the main contact table --}}

@extends('layouts.app')

@section('content')

<main role="main" class="container">

  <div class="starter-template">

    @include('common.errors')

    <h1>Телефонный справочник сотрудников ОАО "РЖД"</h1>

    @if ($contact)

      <div class="table-responsive-sm">
        <form method="post" action="{{ url('/admin/' . $contact->id . '/save') }}">
        @csrf
          <table class="table">
            <thead>
              <tr>
                <th></th>
                <th scope="col">Наименование</th>
                <th scope="col">Подразделение</th>
                <th scope="col">Должность</th>
                <th scope="col">Номер телефона</th>
                <th scope="col">Примечание</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="hidden" value="{{ $contact->id }}" name="id"></td>
                <td><input type="text" name="firstNameInput" class="form-control" value="{{ $contact->firstName }}"></td>
                <td><input type="text" name="secondNameInput" class="form-control" value="{{ $contact->secondName }}"></td>
                <td><input type="text" name="positionInput" class="form-control" value="{{ $contact->position }}"></td>
                <td><input type="text" name="phoneNumberInput" class="form-control" value="{{ $contact->phoneNumber }}"></td>
                <td><input type="text-area" name="noteInput" class="form-control" value="{{ $contact->note }}"></td>
                <td>  
                    <button type="submit" class="btn btn-outline-success EditBtn">Сохранить</button>
                </td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>

    @endif
  
  </div>
</main>
  
@endsection