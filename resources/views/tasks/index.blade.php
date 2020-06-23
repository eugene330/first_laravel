@extends('layouts.default')

@section('content')

    <!-- Bootstrap шаблон... -->

    <a href="{{route('tasks.create')}}">
        <i class="fa fa-plus"></i> Добавить задачу
    </a>

    <!-- Текущие задачи -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Текущая задача
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <tr>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>

                    <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <!-- Имя задачи -->
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>

                            <td>
                                <div style="display: flex">
                                    <form action="{{route('tasks.destroy', $task->id)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    <form action="{{route('tasks.edit', $task->id)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('GET')}}
                                        <button class="btn btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection