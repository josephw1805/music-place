@extends('frontend.artist-dashboard.album.album-app')
@section('album_content')
    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
        <div class="add_course_content">
            <div class="add_course_content_btn_area d-flex flex-wrap justify-content-between">
                <div class="common_btn dynamic-modal-btn" data-id="{{ $albumId }}">Add New Chapter</div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span>Introduction</span>
                        </button>
                        <div class="add_course_content_action_btn">
                            <div class="dropdown">
                                <div class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="far fa-plus"></i>
                                </div>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Add Track</a>
                                    </li>
                                </ul>
                            </div>
                            <a class="edit" href="#"><i class="far fa-edit"></i></a>
                            <a class="del" href="#"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul class="item_list">
                                <li>
                                    <span>Aut autem dolorem debitis mollitia.</span>
                                    <div class="add_course_content_action_btn">
                                        <a class="edit" href="#"><i class="far fa-edit"></i></a>
                                        <a class="del" href="#"><i class="fas fa-trash-alt"></i></a>
                                        <a class="arrow" href="#"><i class="fas fa-arrows-alt"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
