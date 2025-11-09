<div class="row">
    <div class="col-lg-6">
        <hr class="horizontal gray-light my-4">
        <ul class="list-group">

            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                    class="text-dark">{!! __('children.full_name') !!}:</strong>
                &nbsp;
                {!! $child->childFullName() !!}
            </li>


            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.personal_id') !!}:</strong>
                &nbsp;{!! $child->personal_id !!}
            </li>

            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.birthday') !!}:</strong>
                &nbsp;{!! $child->birthday !!}
            </li>


            <li class="list-group-item border-0 ps-0 text-sm"><strong
                    class="text-dark">{!! __('children.classification') !!}:</strong>
                &nbsp;{!! $child->classification !!}
            </li>


            <li class="list-group-item border-0 ps-0 text-sm"><strong
                    class="text-dark">{!! __('children.gender') !!}:</strong>
                &nbsp;{!! $child->gender !!}
            </li>

            <li class="list-group-item border-0 ps-0 text-sm"><strong
                    class="text-dark">{!! __('children.class') !!}:</strong>
                &nbsp;{!! $child->class !!}
            </li>

            <li class="list-group-item border-0 ps-0 text-sm"><strong
                    class="text-dark">{!! __('children.health_status') !!}:</strong>
                &nbsp;{!! $child->health_status !!}
            </li>

            <li class="list-group-item border-0 ps-0 text-sm"><strong
                    class="text-dark">{!! __('children.disease_clarification') !!}:</strong>
                &nbsp;{!! $child->disease_clarification !!}
            </li>

        </ul>

    </div>

    <div class="col-lg-6">
        <hr class="horizontal gray-light my-4">
        <ul class="list-group">

            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                <strong class="text-dark">{!! __('children.authorized_contact_number') !!}:</strong>
                &nbsp;
                {!! $child->authorized_contact_number !!}
            </li>


            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.backup_contact_number') !!}:
                </strong>
                &nbsp;{!! $child->backup_contact_number !!}
            </li>

            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.whatsApp_number') !!}:
                </strong>
                &nbsp;{!! $child->whatsApp_number !!}
            </li>


            <li class="list-group-item border-0 ps-0 text-sm">
                <strong class="text-dark">{!! __('children.governoate_id') !!}:</strong>
                &nbsp;{!! $child->governorate->name !!}
            </li>


            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.city_id') !!}:
                </strong>
                &nbsp;{!! $child->city->name !!}
            </li>

            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.address_details') !!}:
                </strong>
                &nbsp;{!! $child->address_details !!}
            </li>



        </ul>

    </div>

</div>
