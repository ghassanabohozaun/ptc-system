<hr class="horizontal gray-light my-4">
<ul class="list-group">

    <div class="row">
        <div class="col-lg-4">

            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">
                    <p> {!! __('children.orphan_child_birth_certificate') !!}:
                </strong>&nbsp;
                </p>
                <div class="position-relative d-inline-block mr-2 mb-2">

                    <img src="{!! asset('uploads/children/' . $child->childFile->orphan_child_birth_certificate) !!}" alt="profile_image" class="w-100 border-radius-lg shadow-sm" />

                    <a href="{!! asset('uploads/children/' . $child->childFile->orphan_child_birth_certificate) !!}" target="_blank" class="btn btn-info btn-sm position-absolute"
                        style="top: 5px; left: 2px;">
                        {!! __('general.download') !!}
                    </a>
                </div>
            </li>

        </div>

        <div class="col-lg-4">

            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">
                    <p> {!! __('children.father_death_certificate') !!}:
                </strong>&nbsp;
                </p>
                <div class="position-relative d-inline-block mr-2 mb-2">

                    <img src="{!! asset('uploads/children/' . $child->childFile->father_death_certificate) !!}" alt="profile_image" class="w-100 border-radius-lg shadow-sm" />

                    <a href="{!! asset('uploads/children/' . $child->childFile->father_death_certificate) !!}" target="_blank" class="btn btn-info btn-sm position-absolute"
                        style="top: 5px; left: 2px;">
                        {!! __('general.download') !!}
                    </a>
                </div>
            </li>

        </div>

        <div class="col-lg-4">

            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">
                    <p> {!! __('children.guardian_personal_id_photo') !!}:
                </strong>&nbsp;
                </p>
                <div class="position-relative d-inline-block mr-2 mb-2">

                    <img src="{!! asset('uploads/children/' . $child->childFile->guardian_personal_id_photo) !!}" alt="profile_image" class="w-100 border-radius-lg shadow-sm" />

                    <a href="{!! asset('uploads/children/' . $child->childFile->guardian_personal_id_photo) !!}" target="_blank" class="btn btn-info btn-sm position-absolute"
                        style="top: 5px; left: 2px;">
                        {!! __('general.download') !!}
                    </a>
                </div>
            </li>

        </div>


    </div>

</ul>
