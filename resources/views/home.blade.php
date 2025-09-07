@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_project"> Добавить проект</a>

                    <table class="table  datatable">
                        <thead>

                          <tr>
                                <th >#</th>
                                  <th>Заглавие  </th>
                                  <th>Описание </th>
                                  <th>Статус</th>
                                  <th>Созданный на</th>
                                  <th>Действия</th>
                                   </tr>
                                 </thead>
                                  <tbody>
                                    @foreach ($projects as $project)
                                    <tr>
                                           <td>{{$project->id}}</td>
                                           <td>{{$project->title}}</td>
                                           <td>{{$project->description}}</td>
                                           <td>{{$project->status}}</td>
                                           <td>{{$project->created_at}}</td>
                                           <td>
                                                <a href="#" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit_project{{$project->id}}"> редактировать </a>
                                                <a href="{{route('project.delete',['id'=>$project->id])}}" class="btn btn-danger">удалить </a>
                                           </td>

                                           </tr>

                                    @endforeach
                                   </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($projects as $project)
<div class="modal fade" id="edit_project{{$project->id}}" tabindex="-1" aria-labelledby="edit_projectLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="edit_projectLabel">редактировать проект</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
 <form  action="{{route('project.edit')}}"  method="POST">
                @csrf
      <div class="modal-body">

       <input  type="hidden" name="id"  value="{{$project->id}}" />
       <div class="input-block mb-3">
         <label class="col-form-label">Заглавие </label>
         <input class="form-control" type="text" name="title" required  value="{{$project->title}}" />

        </div>
        <div class="input-block mb-3">
         <label class="col-form-label">Описание </label>
         <textarea class="form-control" type="text" name="description" required  >{{$project->description}}</textarea>

        </div>
         <div class="input-block mb-3">
         <label class="col-form-label">Статус </label>
       <select class="form-control" name="status" required>
        <option value="new" @selected($project->status == "new")>новый</option>
        <option value="in_progress" @selected($project->status == "in_progress")>в процессе</option>
       <option value="completed" @selected($project->status == "completed")>завершено</option>
     </select>


        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
      </div>
   </form>
    </div>
  </div>
</div>

   @endforeach
<div class="modal fade" id="add_project" tabindex="-1" aria-labelledby="add_projectLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="add_projectLabel">Добавить проект</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form  action="{{route('project.add')}}"  method="POST">
                @csrf
      <div class="modal-body">

       <div class="input-block mb-3">
         <label class="col-form-label">Заглавие </label>
         <input class="form-control" type="text" name="title" required />

        </div>
        <div class="input-block mb-3">
         <label class="col-form-label">Описание </label>
         <textarea class="form-control" type="text" name="description" required   ></textarea>

        </div>
         <div class="input-block mb-3">
         <label class="col-form-label">Статус </label>
         <select class="form-control" type="text" name="status" required   >
          <option value="new" selected>новый</option>
          <option value="in_progress">в процессе</option>
          <option value="completed">завершено</option>
         </select>

        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
      </div>
     </form>
    </div>
  </div>
</div>
@endsection
