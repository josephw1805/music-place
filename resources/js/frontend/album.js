let notyf = new Notyf({
    duration: 4000,
    position: {
        x: 'right',
        y: 'top',
    }
});

const base_url = $("meta[name='base_url']").attr('content')
const basic_info_url = base_url + '/artist/albums/create';
const update_url = base_url + '/artist/albums/update';

let loader = `
<div class="modal-content text-center p-3" style="display:inline">
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>`;

//album tab navigation
$('.album-tab').on('click', function (e) {
    e.preventDefault();
    let step = $(this).data('step');
    $('.album-form').find('input[name=next_step]').val(step);
    $('.album-form').trigger('submit');
});

$('.basic_info_form').on('submit', function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        method: 'POST',
        url: basic_info_url,
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () { },
        success: function (data) {
            if (data.status == 'success') {
                window.location.href = data.redirect;
            }
        },
        error: function (xhr, status, error) {
            let errors = xhr.responseJSON.errors;
            $.each(errors, function (key, value) {
                notyf.error(value[0]);
            });
        },
        complete: function () { }
    });
});

$('.more_info_form').on('submit', function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        method: 'POST',
        url: update_url,
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () { },
        success: function (data) {
            if (data.status == 'success') {
                window.location.href = data.redirect;
            }
        },
        error: function (xhr, status, error) { },
        complete: function () { }
    });
});

$('.basic_info_update_form').on('submit', function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        method: 'POST',
        url: update_url,
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () { },
        success: function (data) {
            if (data.status == 'success') {
                window.location.href = data.redirect;
            }
        },
        error: function (xhr, status, error) { },
        complete: function () { }
    });
});

// show hide path input depending on source
$('.storage').on('change', function () {
    let value = $(this).val();
    $('.source_input').val('');
    if (value == 'upload') {
        $('.upload_source').removeClass('d-none');
        $('.external_source').addClass('d-none');
    } else {
        $('.external_source').removeClass('d-none');
        $('.upload_source').addClass('d-none');
    }
});

/** Album Contents */
$('.dynamic-modal-btn').on('click', function () {
    $('#dynamic-modal').modal('show');

    let album_id = $(this).data('id');

    $.ajax({
        method: 'GET',
        url: base_url + '/artist/album-content/:id/create-chapter'.replace(':id', album_id),
        data: {},
        beforeSend: function () {
            $('.dynamic-modal-content').html(loader);
        },
        success: function (data) {
            $('.dynamic-modal-content').html(data);
        },
        error: function (xhr, status, error) { }
    })
});