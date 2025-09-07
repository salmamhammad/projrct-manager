@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">задачи в проекте: {{$project->title}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                      <a
                            href="{{ url('/home') }}"
                            class="btn btn-primary"
                        >
                            проекты
                        </a>
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_task"> Добавить Задачa</a>

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
                                    @foreach ($tasks as $task)
                                    <tr>
                                           <td>{{$task->id}}</td>
                                           <td>{{$task->title}}</td>
                                           <td>{{$task->description}}</td>
                                           <td>{{$task->status}}</td>
                                           <td>{{$task->created_at}}</td>
                                           <td>
                                                <a href="#" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit_task{{$task->id}}"> редактировать </a>
                                                <a href="{{route('task.delete',['id'=>$task->id])}}" class="btn btn-danger">удалить </a>
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
@foreach ($tasks as $task)
<div class="modal fade" id="edit_task{{$task->id}}" tabindex="-1" aria-labelledby="edit_taskLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="edit_taskLabel">редактировать Задачa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  action="{{route('task.edit')}}"  method="POST">
                @csrf
      <div class="modal-body">
       <input  type="hidden" name="project_id"  value="{{$project->id}}" />

       <input  type="hidden" name="id"  value="{{$task->id}}" />
       <div class="input-block mb-3">
         <label class="col-form-label">Заглавие </label>
        <input class="form-control @error('title') is-invalid @enderror " type="text" name="title" required value="{{ $task->title }}" />


        </div>
        <div class="input-block mb-3">
         <label class="col-form-label">Описание </label>
         <textarea class="form-control @error('description') is-invalid @enderror" type="text" name="description" required >{{$task->description}}</textarea>

        </div>
         <div class="input-block mb-3">
         <label class="col-form-label">Статус </label>
       <select class="form-control" name="status" required>
        <option value="new" @selected($task->status == "new")>новый</option>
        <option value="in_progress" @selected($task->status == "in_progress")>в процессе</option>
       <option value="completed" @selected($task->status == "completed")>завершено</option>
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
<div class="modal fade" id="add_task" tabindex="-1" aria-labelledby="add_taskLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="add_taskLabel">Добавить Задачa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  action="{{route('task.add')}}"  method="POST">
                @csrf
      <div class="modal-body">
       <input  type="hidden" name="project_id"  value="{{$project->id}}" />

       <div class="input-block mb-3">
         <label class="col-form-label">Заглавие </label>
        <input class="form-control @error('title') is-invalid @enderror " type="text" name="title" required value="{{ old('title') }}" />


        </div>
        <div class="input-block mb-3">
         <label class="col-form-label">Описание </label>
         <textarea class="form-control @error('description') is-invalid @enderror" type="text" name="description" required value="{{ old('title') }}"  ></textarea>


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
