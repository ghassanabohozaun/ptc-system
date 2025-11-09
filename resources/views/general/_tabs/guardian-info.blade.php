<hr class="horizontal gray-light my-4">
<ul class="list-group">


    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.guardian_full_name') !!}:</strong>
        &nbsp;{!! $child->childGuardian->guardian_full_name !!}
    </li>

    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.guardian_personal_id') !!}:</strong>
        &nbsp;{!! $child->childGuardian->guardian_personal_id !!}
    </li>


    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.guardian_birthday') !!}:</strong>
        &nbsp;{!! $child->childGuardian->guardian_birthday !!}
    </li>

    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.why_not_the_mother_is_guardian') !!}:</strong>
        &nbsp;{!! $child->childGuardian->why_not_the_mother_is_guardian !!}
    </li>

    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.guardian_relationship_with_the_child') !!}:</strong>
        &nbsp;{!! $child->childGuardian->guardian_relationship_with_the_child !!}
    </li>

</ul>
