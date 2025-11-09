<hr class="horizontal gray-light my-4">
<ul class="list-group">

    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">{!! __('children.number_of_people_including_mother') !!}:</strong>
        &nbsp;
        {!! $child->childFamily->number_of_people_including_mother !!}
    </li>


    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.male_number') !!}:</strong>
        &nbsp;{!! $child->childFamily->male_number !!}
    </li>

    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.female_number') !!}:</strong>
        &nbsp;{!! $child->childFamily->female_number !!}
    </li>

    <hr />

    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.father_full_name') !!}:</strong>
        &nbsp;{!! $child->childFather->father_full_name !!}
    </li>


    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.father_personal_id') !!}:</strong>
        &nbsp;{!! $child->childFather->father_personal_id !!}
    </li>

    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.father_date_of_death') !!}:</strong>
        &nbsp;{!! $child->childFather->father_date_of_death !!}
    </li>

    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.father_respon_of_death') !!}:</strong>
        &nbsp;{!! $child->childFather->father_respon_of_death !!}
    </li>

    <hr />
    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.mother_full_name') !!}:</strong>
        &nbsp;{!! $child->childMother->mother_full_name !!}
    </li>

    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.mother_personal_id') !!}:</strong>
        &nbsp;{!! $child->childMother->mother_personal_id !!}
    </li>
    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.mother_date_of_death') !!}:</strong>
        &nbsp;{!! $child->childMother->mother_date_of_death !!}
    </li>
    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.is_mother_alive') !!}:</strong>
        &nbsp;{!! $child->childMother->is_mother_alive == 0 ? __('children.no') : __('children.yes') !!}
    </li>
    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">{!! __('children.is_mother_the_guardian') !!}:</strong>
        &nbsp;{!! $child->childMother->is_mother_the_guardian == 0 ? __('children.no') : __('children.yes') !!}
    </li>

</ul>
