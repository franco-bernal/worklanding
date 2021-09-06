@extends('layouts.admin')

@section('content')
<h2 class="py-6">{{ $proyect->title }}</h2>
<div class='columns is-mobile is-gapless is-multiline proyects'>
    <div class='column is-3-fullhd is-3-desktop  is-6-tablet  is-6-mobile' style="padding:10px !important;">
        <p>Procesos</p>

    </div>
    <div class='column is-3-fullhd is-3-desktop  is-6-tablet  is-6-mobile' style="padding:10px !important;">
        <p>Creado:</p>
        <p>{{ $proyect->created_at }}</p>
    </div>
    <div class='column is-3-fullhd is-3-desktop  is-6-tablet  is-6-mobile' style="padding:10px !important;">
        <p>Tiempo calculado</p>
    </div>
    <div class='column is-3-fullhd is-3-desktop  is-6-tablet  is-6-mobile' style="padding:10px !important;">
        <a class="btn-solid" onclick="deleteProyect('{{ $proyect->id }}')">Eliminar</a>
    </div>
    <div class='column is-3-fullhd is-3-desktop  is-6-tablet  is-6-mobile' style="padding:10px !important;">
        <p>Descripción</p>
        <p>{{ $proyect->description }}</p>
    </div>
    <div class='column is-3-fullhd is-3-desktop  is-6-tablet  is-6-mobile' style="padding:10px !important;">
        <p>Fecha Límite:</p>
        <p>{{ $proyect->limit }}</p>
    </div>
    <div class='column is-3-fullhd is-3-desktop  is-6-tablet  is-6-mobile' style="padding:10px !important;">
        @if($proyect->favorite==true)
        <span class="star stactive">★</span>
        @else
        <span class="star">★</span>
        @endif
    </div>
    <div class='column is-3-fullhd is-3-desktop  is-6-tablet  is-6-mobile' style="padding:10px !important;">
        <a class="btn-solid">Modificar</a>
    </div>
</div>
<hr>


<div class="process">
    @forelse(json_decode($proyect->steps) as $step)
    <div class="step" id="step-{{ $step }}">
        <div>
            <h4>EN {{ $step }}</h4>
        </div>
        <div>
            <div id="stepSpace">
                @foreach( $proyect->tasks as $task)
                @if($task->step == $step)
                <a class="task" id="taskElement{{ $task->id }}">
                    <div class="selectStepInput">
                        @foreach(json_decode($proyect->steps) as $stepe)
                        <span onclick="moveTo('{{ $task->id }}','{{ $stepe }}','#taskElement{{ $task->id }}')">{{ $stepe }}</span>
                        @endforeach
                    </div>
                    <p onclick="taskTab('{{ $task->id }}')">{{ $task->name }}</p>
                </a>
                @endif
                @endforeach
            </div>
            <div class="taskADD">
                <a onclick="addStep('{{ $step }}')"><img id="btn-img" class="centrar" src="{{ asset('img/circulo-plus.png') }}" alt=""></a>
                <!-- <div id="step-{{ $step }}" onclick="addtask('{{ $step }}')" class="taskADD"><img class="centrar" src="{{ asset('img/circulo-plus.png') }}" alt=""> -->
                <form id="form-{{ $step }}" class="stepForm">
                    <br>
                    <textarea placeholder="Titulo de la tarea" id="txt{{ $step }}-name" rows="4"></textarea>
                    <input type="hidden" value="{{ $step }}">
                    <a class="btn-square" onclick="addTaskForm('{{ $proyect->id }}','{{ $step }}','txt{{ $step }}-name')">Crear</a>
                </form>
            </div>
        </div>
    </div>

    @empty
    @endforelse

    <div class="step" id="addStep">
        <div>
            <h4>Agregar Step</h4>
        </div>

    </div>
</div>

<div class="taskView">
    <div class="taskSpace">
        <span onclick="closeTask('.taskSpace')" class="close-task">&#10060</span>
        <h4 id="idNameTask" data-id="">Nombre tarea</h4>
        <div class='columns is-mobile is-gapless is-multiline proyects'>
            <div class='column is-12-fullhd is-12-desktop  is-12-tablet  is-12-mobile stepModal' style='margin: 10px 0;'>



            </div>
            <div class='column is-12-fullhd is-12-desktop  is-12-tablet  is-12-mobile'>
                <textarea name="" id="idDescriptionTask" style="width:100% !important; min-height:120px;"></textarea>
            </div>
            <div class='column is-8-fullhd is-8-desktop  is-12-tablet  is-12-mobile'>
                <p class="titleSubTasks">
                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPgo8Y2lyY2xlIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgc3R5bGU9IiIgY3g9IjI1NiIgY3k9IjI1NiIgcj0iMjU2IiBmaWxsPSIjMjg5NmZmIiBkYXRhLW9yaWdpbmFsPSIjMjg5NmZmIj48L2NpcmNsZT4KPHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHlsZT0iIiBkPSJNMzYzLjY5MywxNDAuOTZsLTE1LjUzMy0xNS41MzNIMTA3LjgwM3YyNjEuMTQ2bDEyNC4zMDgsMTI0LjMwOCAgQzIzOS45NzksNTExLjYwOSwyNDcuOTQzLDUxMiwyNTYsNTEyYzEzNy44MTUsMCwyNTAuMTc1LTEwOC45MDUsMjU1Ljc2My0yNDUuMzQ4TDQwNC4xOTYsMTU5LjA4NmwtMzMuNDAxLTI2LjY3NkwzNjMuNjkzLDE0MC45NnoiIGZpbGw9IiMxZTczYmUiIGRhdGEtb3JpZ2luYWw9IiMxZTczYmUiPjwvcGF0aD4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KCTxwb2x5Z29uIHN0eWxlPSIiIHBvaW50cz0iMzM5LjI2NSwzNTYuODg4IDEzNy40ODksMzU2Ljg4OCAxMzcuNDg5LDE1NS4xMTIgMzIzLjUwMSwxNTUuMTEyIDM0OC4xNjEsMTI1LjQyNyAgICAxMDcuODA0LDEyNS40MjcgMTA3LjgwNCwzODYuNTczIDM2OC45NSwzODYuNTczIDM2OC45NSwyNDAuNzI3IDMzOS4yNjUsMjc2LjMzMyAgIiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjZmZmZmZmIj48L3BvbHlnb24+Cgk8cG9seWdvbiBzdHlsZT0iIiBwb2ludHM9IjE4Mi4xNDcsMjAzLjcwMSAxNTIuMzE4LDIzMy41MyAyNTYuNjE4LDMzNy44MyAyOTkuNTc4LDI4OC41NjQgMjk5LjU3OCwyODguNTY0ICAgIDQwNC4xOTYsMTU5LjA4NiAzNzAuNzk1LDEzMi40MSAyNTMuNTU1LDI3My41NDcgICIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iI2ZmZmZmZiI+PC9wb2x5Z29uPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjwvZz48L3N2Zz4=" />
                    Subtareas
                </p>
                <div class="subtareas listTasked">
                    <div>
                        <textarea id="input-subTask" style="width:100%; padding:5px;" rows="1"></textarea>
                        <button class="btn-solid" id="btn-addSubTask"><img src="{{ asset('img/circulo-plus.png') }}" alt=""></button>
                    </div>
                    <div id="htmlSubTasks">
                        <!-- Creation Task -->
                    </div>
                </div>
                <p class="titleSubTasks">
                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDEyOCAxMjgiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iNjQiIGN5PSI2My45OTciIGZpbGw9IiM0ZDU2ODAiIHI9IjYyLjI1IiBkYXRhLW9yaWdpbmFsPSIjNGQ1NjgwIiBzdHlsZT0iIiBjbGFzcz0iIj48L2NpcmNsZT48Y2lyY2xlIGN4PSI2NCIgY3k9IjYzLjk5NyIgZmlsbD0iI2YzZjVmOSIgcj0iNTQuMjUiIGRhdGEtb3JpZ2luYWw9IiNmM2Y1ZjkiIHN0eWxlPSIiPjwvY2lyY2xlPjxwYXRoIGQ9Im01My42ODggOTguODkzLTMxLjU3Mi0zMS41NzIgMTQuMTQzLTE0LjE0MiAxNy40MjkgMTcuNDI4IDM4LjA1My0zOC4wNTMgMTQuMTQzIDE0LjE0MnoiIGZpbGw9IiM4MGVjYzYiIGRhdGEtb3JpZ2luYWw9IiM4MGVjYzYiIHN0eWxlPSIiPjwvcGF0aD48L2c+PC9nPjwvc3ZnPg==" />
                    Criterios de aceptación
                </p>

                <div class="checkList listTasked">
                    <div>
                        <textarea id="input-checkList" style="width:100%; padding:5px; " rows="1"></textarea>
                        <button class="btn-solid" id="btn-addCheckList"><img src="{{ asset('img/circulo-plus.png') }}" alt=""></button>
                    </div>
                    <div id="htmlLists">
                        <!-- Create List -->
                    </div>

                </div>
            </div>
            <div class='column is-4-fullhd is-4-desktop  is-12-tablet  is-12-mobile'>
                <div class='task-coment'>
                    <a href="">Comentarios</a>
                    <div>
                        <textarea id="input-comment" style="width:100%;padding:5px;" rows="1"></textarea>
                        <button class="btn-solid" id="btn-addComment">Comentar</button>
                    </div>
                    <div class="comments" id="htmlComments">

                    </div>
                    <!-- usuario,fecha, comentario, -->
                </div>
            </div>
        </div>


    </div>
</div>

@endsection

@section('js')
<style>
    .taskSpace {
        /* background-image: linear-gradient(rgba(0, 0, 0, 0.747), rgba(0, 1, 65, 0.747)),
        url('{{ $proyect->img_link }}'); */

    }

    html {
        background-image:linear-gradient(rgba(2, 2, 2, 0.63), rgba(0, 0, 0, 0.61)),
        url('{{ $proyect->img_link }}') !important;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }
</style>
<script src="{{ asset('js/tasks.js') }}"></script>
<script>
    function deleteProyect(id) {
        let opcion = confirm("Seguro de eliminar el proyecto?");
        if (opcion) {
            let opcion2 = confirm("MUYY Seguro de eliminar el proyecto??? D:");
            if (opcion2) {
                location.href = "{{ route('proyect.delete',['id'=>$proyect->id]) }}";
            } else {
                alert("Viste... Menos mal pregunté dos veces! si la cosa no anda al lote, cuidado para la proxima.")
            }
        }
    }


    function addStep(step) {
        if ($('#form-' + step).css('display') == 'none') {
            $('.taskADD form').slideUp();
            $('#form-' + step).slideDown();
        } else {
            $('.taskADD form').slideUp();
        }

    }

    function addTaskForm(idProyect, step, elementId) {
        let text = $('#txt' + step + '-name').val();
        if (text.length != 0 || text != "") {

            $.ajax({
                type: 'get',
                url: "{{ route('task.addtask') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: idProyect,
                    step: step,
                    name: text,
                },
                success: function(data) {
                    if (data != null) {
                        let taskA = document.createElement('a');
                        taskA.setAttribute('class', 'task');
                        taskA.id = `taskElement${data.id}`;

                        let divSelect = document.createElement('div');
                        divSelect.setAttribute('class', 'selectStepInput');

                        steps.map(function(step) {
                            let spanClick = document.createElement('span');
                            // spanClick.setAttribute('onclick', `moveTo('${data.id}','${step}','#taskElement${data.id}')`);
                            spanClick.innerText = step;
                            divSelect.appendChild(spanClick);
                        })

                        let openTab= document.createElement('p');
                        openTab.setAttribute('onclick',`taskTab('${data.id}')`);
                        openTab.innerText=text;
                      
                        taskA.appendChild(divSelect);
                        taskA.appendChild(openTab);
                        stepActive(data.step);
                      
                        $('#step-' + step + ' #stepSpace').append(taskA);
                        $('#txt' + step + '-name').val('');
                    } else {
                        alert('error al agregar');
                    }
                },
                error: function(error) {}
            }).fail(function(jqXHR, textStatus, error) {

            });


        } else {
            $('#txt' + step + '-name').focus();
        }
    }

    var steps = [];
    '@foreach( json_decode($proyect->steps) as $step)'
    steps.push('{{ $step }}');
    '@endforeach'

    function taskTab(id) {
        $.ajax({
            type: 'get',
            url: "{{ route('task.getTask') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
            },
            success: function(data) {

                $("#htmlSubTasks").html('');
                $("#htmlLists").html('');
                $("#htmlComments").html('');
                $(".stepModal").html('');
                if (data != null) {
                    $('#idDescriptionTask').attr('data-taskid', data.id);
                    $('#idDescriptionTask').text(data.description);
                    $("#idNameTask").text(data.name);


                    steps.map(function(step) {
                        $(".stepModal").append(`<span id="target${step}" class='stepTask'  onclick="moveTo('${data.id}','${step}','#taskElement${data.id}')">${step}</span>`);
                    })

                    stepActive(data.step);


                    // <button class="btn-solid" id="btn-addSubTask" onclick="addSubTask('#input-subtask', 'subTasks')"><img src="{{ asset('img/circulo-plus.png') }}" alt=""></button>
                    $("#btn-addSubTask").attr('onclick', `addJsonHtml('input-subTask', 'subTasks','${data.id}')`);
                    $("#btn-addCheckList").attr('onclick', `addJsonHtml('input-checkList', 'checkLists','${data.id}')`);
                    $("#btn-addComment").attr('onclick', `addJsonHtml('input-comment', 'comments','${data.id}')`);

                    $("#idDescriptionTask").text(data.description);
                    JSON.parse(data.subTasks).map((sub_task) => {
                        $("#htmlSubTasks").append(`<span id='${sub_task.id}subTasks'><a onclick="deleteJsonHtml('subTasks','${data.id}',${sub_task.id},'${sub_task.created_at}')">&#10060;</a><p onclick="checkSub('subTasks','${data.id}','${sub_task.id}')"  style="${sub_task.check == 1 ? 'text-decoration: line-through !important;':''}">${sub_task.detail} ${sub_task.check}</p></span>`);
                    });
                    JSON.parse(data.checkLists).map((list) => {
                        $("#htmlLists").append(`<span id='${list.id}checkLists'><a onclick="deleteJsonHtml('checkLists','${data.id}',${list.id},'${list.created_at}')">&#10060;</a><p onclick="checkSub('checkLists','${data.id}','${list.id}')"  style="${list.check == 1 ? 'text-decoration: line-through !important;':''}">${list.detail}</p></span>`);
                    });
                    JSON.parse(data.comments).map((coment) => {
                        $("#htmlComments").append(`<div id='${coment.id}comments'><span>${coment.user}, ${coment.created_at}</span><p>${coment.detail}</p><a onclick="deleteJsonHtml('comments','${data.id}',${coment.id},'${coment.created_at}')">Eliminar</a></div>`);
                    });

                } else {
                    alert('error al agregar');
                }
            },
            error: function(error) {}
        }).fail(function(jqXHR, textStatus, error) {});
        $(".taskSpace").slideDown("slow");
    }

    function deleteJsonHtml(type, task_id, id_subtask, created_at) {
        let route = "{{ route('task.deleteFromJson') }}";
        let token = $('meta[name="csrf-token"]').attr('content');
        deleteSubTask(route, token, type, task_id, id_subtask, created_at);
    }

    function closeTask(clase) {
        $(clase).slideUp();
    }

    function addJsonHtml(identificador, type, task_id) {
        let toAdd = $(`#${identificador}`).val().trim();
        if (toAdd != "") {
            let route = "{{ route('task.addToJson') }}";
            let token = $('meta[name="csrf-token"]').attr('content');
            addSubTask(route, token, type, task_id, toAdd, identificador);
        } else {
            alert('Ingrese valor');
        }


    }

    function checkSub(type, task_id, subId) {
        let route = "{{ route('task.checkFromJson') }}";
        let token = $('meta[name="csrf-token"]').attr('content');
        checkSubGet(route, token, type, task_id, subId);
    }

    $('#idDescriptionTask').blur(function(e) {
        let route = "{{ route('task.editTaskDescription') }}";
        let token = $('meta[name="csrf-token"]').attr('content');
        editDescription(route, token, $(this).attr('data-taskid'), $(this).val());
    })


    function moveTo(idTAsk, step, elementId) {

        $.ajax({
            type: 'post',
            url: "{{ route('task.editTaskStep') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                idTAsk: idTAsk,
                step: step,
                elementId: elementId,
            },
            success: function(data) {
                if (data > 0) {
                    alert("cambiado a " + step);
                    $("#step-" + step + " #stepSpace").append($(elementId));
                    stepActive(step);
                } else {
                    alert('error al agregar');
                }
            },
            error: function(error) {
                alert('error al agregar');
            }
        }).fail(function(jqXHR, textStatus, error) {
            alert('error al agregar');
        });


    }

    function stepActive(step) {
        $(".stepModal span").removeClass("stepActive")
        $("#target" + step).addClass("stepActive");
    }
</script>
@endsection