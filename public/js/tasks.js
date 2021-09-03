function deleteSubTask(route, token, type, task_id, id_subtask, created_at) {

    $.ajax({
        type: 'get',
        url: route,
        headers: {
            'X-CSRF-TOKEN': token
        },
        data: {
            type: type,
            task_id: task_id,
            id_subtask: id_subtask,
            created_at: created_at,
        },
        success: function (data) {
            if (data == 1) {
                $(`#${id_subtask}${type}`).slideUp();
            } else {
                alert("error al borrar");
            }
            // $(`#${created_at}${type}`).hide();
        },
        error: function (error) {
            return error;
        }
    }).fail(function (jqXHR, textStatus, error) {
        return error;
    });
}


function addSubTask(route, token, type, task_id, toAdd, identificador) {

    $.ajax({
        type: 'post',
        url: route,
        headers: {
            'X-CSRF-TOKEN': token
        },
        data: {
            type: type,
            task_id: task_id,
            toAdd: toAdd,
        },
        success: function (data) {
            console.log(data);
            if (data != -1) {
                if (type == 'comments') {
                    $("#htmlComments").prepend(`<div  id='${data.id}comments'><span>${data.user}, ${data.created_at}</span><p>${toAdd}</p><a onclick="deleteJsonHtml('comments','${task_id}',${data.id},'${data.created_at}')">Eliminar</a></div>`).slideDown();
                }
                if (type == 'subTasks') {
                    $("#htmlSubTasks").prepend(`<span  id='${data.id}subTasks'><a  onclick="deleteJsonHtml('subTasks','${task_id}',${data.id},'${data.created_at}')">&#10060;</a><p onclick="checkSub('subTasks','${task_id}','${data.id}')"  style="text-decoration: none;">${toAdd} </p></span>`).slideDown();
                }
                if (type == 'checkLists') {
                    $("#htmlLists").prepend(`<span  id='${data.id}checkLists'><a onclick="deleteJsonHtml('checkLists','${task_id}',${data.id},'${data.created_at}')">&#10060;</a><p onclick="checkSub('checkLists','${task_id}','${data.id}')"  style="text-decoration: none;">${toAdd}</p></span>`).slideDown();
                }
                $(`#${identificador}`).val('');

            } else {
                alert("error al agregar");
            }


        },
        error: function (error) {
            return error;
        }
    }).fail(function (jqXHR, textStatus, error) {
        return error;
    });
}


function checkSubGet(route, token, type, task_id, subId) {

    if ($(`#${subId}${type} p`).attr('style') == 'text-decoration: line-through !important;') {
        $(`#${subId}${type} p`).attr('style', '');
    } else {
        $(`#${subId}${type} p`).attr('style', 'text-decoration: line-through !important;');
    }

    $.ajax({
        type: 'get',
        url: route,
        headers: {
            'X-CSRF-TOKEN': token
        },
        data: {
            type: type,
            task_id: task_id,
            id_subtask: subId,
        },
        success: function (data) {
            if (data != 1) {
                if ($(`#${subId}${type} p`).attr('style') == 'text-decoration: line-through !important;') {
                    $(`#${subId}${type} p`).attr('style', '');
                } else {
                    $(`#${subId}${type} p`).attr('style', 'text-decoration: line-through !important;');
                }
                alert("error al actualizar, recargue la página");
            }
        },
        error: function (error) {
            alert("error al actualizar, recargue la página");

        }
    }).fail(function (jqXHR, textStatus, error) {
        alert("error al actualizar, recargue la página");

    });

}

function editDescription(route, token, task_id, description) {
    $.ajax({
        type: 'post',
        url: route,
        headers: {
            'X-CSRF-TOKEN': token
        },
        data: {
            task_id: task_id,
            description: description,
        },
        success: function (data) {
            console.log(data);
        },
        error: function (error) {
            return error;
        }
    }).fail(function (jqXHR, textStatus, error) {
        return error;
    });
}