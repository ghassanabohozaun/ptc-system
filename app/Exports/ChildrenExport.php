<?php

namespace App\Exports;

use App\Models\Admin;
use App\Models\Child;
use App\Models\ChildGuardian;
use App\Models\FlightTicket;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Mpdf\Tag\Th;
use PhpOffice\PhpSpreadsheet\Style;
use PhpOffice\PhpSpreadsheet\Style\Style as DefaultStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ChildrenExport implements WithHeadings, FromCollection, WithMapping, WithColumnWidths, ShouldAutoSize, WithStyles, WithEvents
{
    use RegistersEventListeners;
    public $child;

    protected $columns;
    public $filters;
    protected $index;

    public function __construct($child, array $columns, $filters)
    {
        $this->child = $child;
        $this->columns = $columns;
        $this->filters = $filters;
    }

    public function headings(): array
    {
        return array_map(function ($column) {
            return __('children.' . $column); // Format for better readability
        }, $this->columns);

        // Use the column names as headings
        // return array_map(function ($column) {
        //     return ucwords(str_replace('_', ' ', $column)); // Format for better readability
        // }, $this->columns);

        // $headings = [];

        // if (in_array('id', $this->columns)) {
        //     $headings['id'] = __('admins.id');
        // }
        // if (in_array('name', $this->columns)) {
        //     $headings['name'] = __('admins.name');
        // }
        // if (in_array('email', $this->columns)) {
        //     $headings['email'] = __('admins.email');
        // }

        // $headings['id'] = __('children.id');
        // $headings['first_name'] = __('children.first_name');
        // $headings['father_name'] = __('children.father_name');
        // $headings['grand_father_name'] = __('children.grand_father_name');
        // $headings['family_name'] = __('children.family_name');
        // $headings['personal_id'] = __('children.personal_id');
        // $headings['birthday'] = __('children.birthday');
        // $headings['gender'] = __('children.gender');
        // $headings['health_status'] = __('children.health_status');
        // $headings['class'] = __('children.class');
        // $headings['number_of_people_including_mother'] = __('children.number_of_people_including_mother');
        // $headings['guardian_full_name'] = __('children.guardian_full_name');
        // $headings['guardian_personal_id'] = __('children.guardian_personal_id');
        // $headings['guardian_relationship_with_the_child'] = __('children.guardian_relationship_with_the_child');
        // $headings['governoate_id'] = __('children.governoate_id');
        // $headings['city_id'] = __('children.city_id');
        // $headings['authorized_contact_number'] = __('children.authorized_contact_number');
        // $headings['whatsApp_number'] = __('children.whatsApp_number');

        //return $headings;
    }

    // public function query()
    // {
    //     $query = Child::with(['childFile', 'childFamily', 'childFather', 'childMother', 'childGuardian', 'childFile', 'governorate', 'city'])->get();
    //     return $query;
    // }

    public function collection()
    {
        return Child::with(['childFile', 'childFamily', 'childFather', 'childMother', 'childGuardian', 'childFile', 'governorate', 'city'])

            ->when(!empty($this->filters['classification']), function ($query) {
                $query->where('classification', $this->filters['classification']);
            })
            ->when(!empty($this->filters['gender']), function ($query) {
                $query->where('gender', $this->filters['gender']);
            })
            ->when(!empty($this->filters['health_status']), function ($query) {
                $query->where('health_status', $this->filters['health_status']);
            })
            ->when(!empty($this->filters['city_id']), function ($query) {
                $query->where('city_id', $this->filters['city_id']);
            })
            ->when(!empty($this->filters['governoate_id']), function ($query) {
                $query->where('governoate_id', $this->filters['governoate_id']);
            })

            ->get();
    }

    public function map($row): array
    {
        $items = [];

        if (in_array('id', $this->columns)) {
            $items['id'] = ++$this->index;
        }

        if (in_array('first_name', $this->columns)) {
            $items['first_name'] = $row->first_name;
        }
        if (in_array('father_name', $this->columns)) {
            $items['father_name'] = $row->father_name;
        }
        if (in_array('grand_father_name', $this->columns)) {
            $items['grand_father_name'] = $row->grand_father_name;
        }
        if (in_array('family_name', $this->columns)) {
            $items['family_name'] = $row->family_name;
        }
        if (in_array('personal_id', $this->columns)) {
            $items['personal_id'] = $row->personal_id;
        }
        if (in_array('birthday', $this->columns)) {
            $items['birthday'] = $row->birthday;
        }
        if (in_array('classification', $this->columns)) {
            $items['classification'] = $row->childClassification();
        }
        if (in_array('gender', $this->columns)) {
            $items['gender'] = $row->childGender();
        }
        if (in_array('class', $this->columns)) {
            $items['class'] = $row->childClass();
        }
        if (in_array('health_status', $this->columns)) {
            $items['health_status'] = $row->childHealthStatus();
        }

        if (in_array('authorized_contact_number', $this->columns)) {
            $items['authorized_contact_number'] = '05' . $row->authorized_contact_number;
        }
        if (in_array('whatsApp_number', $this->columns)) {
            $items['whatsApp_number'] = '+0094' . $row->whatsApp_number;
        }

        if (in_array('governoate_id', $this->columns)) {
            $items['governoate_id'] = $row->governorate->name;
        }
        if (in_array('city_id', $this->columns)) {
            $items['city_id'] = $row->city->name;
        }

        // family
        if (in_array('number_of_people_including_mother', $this->columns)) {
            $items['number_of_people_including_mother'] = $row->childFamily->number_of_people_including_mother;
        }
        if (in_array('male_number', $this->columns)) {
            $items['male_number'] = $row->childFamily->male_number;
        }
        if (in_array('female_number', $this->columns)) {
            $items['female_number'] = $row->childFamily->female_number;
        }

        // father
        if (in_array('father_full_name', $this->columns)) {
            $items['father_full_name'] = $row->childFather->father_full_name;
        }
        if (in_array('father_personal_id', $this->columns)) {
            $items['father_personal_id'] = $row->childFather->father_personal_id;
        }
        if (in_array('father_date_of_death', $this->columns)) {
            $items['father_date_of_death'] = $row->childFather->father_date_of_death;
        }
        if (in_array('father_respon_of_death', $this->columns)) {
            $items['father_respon_of_death'] = $row->childFather->childFatherResponOfDeath();
        }

        //// mother
        if (in_array('mother_full_name', $this->columns)) {
            $items['mother_full_name'] = $row->childMother->mother_full_name;
        }
        if (in_array('mother_personal_id', $this->columns)) {
            $items['mother_personal_id'] = $row->childMother->mother_personal_id;
        }
        if (in_array('is_mother_alive', $this->columns)) {
            $items['is_mother_alive'] = $row->childMother->isMotherAliveFunction();
        }
        if (in_array('mother_date_of_death', $this->columns)) {
            $items['mother_date_of_death'] = $row->childMother->mother_date_of_death;
        }
        if (in_array('is_mother_the_guardian', $this->columns)) {
            $items['is_mother_the_guardian'] = $row->childMother->isMotherTheGuardianFunction();
        }

        //// guardian
        if (in_array('guardian_full_name', $this->columns)) {
            $items['guardian_full_name'] = $row->childGuardian->guardian_full_name;
        }
        if (in_array('guardian_personal_id', $this->columns)) {
            $items['guardian_personal_id'] = $row->childGuardian->guardian_personal_id;
        }
        if (in_array('guardian_birthday', $this->columns)) {
            $items['guardian_birthday'] = $row->childGuardian->guardian_birthday;
        }
        if (in_array('why_not_the_mother_is_guardian', $this->columns)) {
            $items['why_not_the_mother_is_guardian'] = $row->childGuardian->childWhyNotTheMotherIsGuardian();
        }
        if (in_array('guardian_relationship_with_the_child', $this->columns)) {
            $items['guardian_relationship_with_the_child'] = $row->childGuardian->childGuardianRelationshipWithTheChild();
        }

        return $items;
    }

    public function columnWidths(): array
    {
        return [
            'B' => 30,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // return [
        //     '1' => ['font' => ['bold' => true]],
        // ];
        $sheet->getStyle('1')->getFont()->setBold(true);
        $sheet
            ->getStyle('B1:B' . $sheet->getHighestRow())
            ->getAlignment()
            ->setWrapText(true);
    }

    /**
     * @return array|void
     */
    public function defaultStyles(DefaultStyles $defaultStyle)
    {
        return [
            'font' => [
                'name' => 'Calibri',
                'size' => 14,
            ],
            'alignment' => [
                'horizontal' => Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => Style\Alignment::VERTICAL_CENTER,
            ],
        ];
    }

    public static function afterSheet(AfterSheet $event)
    {
        $direction = Lang() == 'ar' ? true : false;
        return $event->sheet->getDelegate()->setRightToLeft($direction);
    }
}
