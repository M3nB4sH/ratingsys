<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $form->name ." - " . $teacher->name}}</title>

    <style>
        table {
            border-collapse: collapse;
            max-width: 2480px;
            width:80%;
        }
        table td{
            width: auto;
            overflow: hidden;
            word-wrap: break-word;
        }
        @media print {
            body {
                zoom: 72%;
            }
            }
        .myTable {
            border: 3px solid black;
        }
            .center {
                margin-left: auto;
                margin-right: auto;
            }
            .myelement {
                clear:left;
                height:auto;
                margin: auto;
                font-size: 130%; // See below for explanation of this
            }
            .myelementt {
                font-size: 110%; // See below for explanation of this
            }

    </style>
</head>
@if ($form->type == App\Enums\Formtype::Field)
    <body class="center" style="width: 100%;  print-color-adjust: exact;" dir="rtl">
        <?php
            $a = 1;
        ?>
        <div class="center" style="border-style: solid solid solid solid; width: 80%;">
            <h3 style="text-align: center;">{{ $form->name }}</h3>
            <table class="center myTable">
                <tr>
                    <th class="myTable" width="1%" style="background-color: #d9d9d9;">م</th>
                    <th class="myTable" width="65%" style="font-size: 120%; background-color: #d9d9d9;"><p><strong>الكفايات</strong></p></th>
                    @if ($form->type == App\Enums\Formtype::Field)
                        @foreach ($allEstimates as $estimate)
                            <th class="myTable" width="10%" style="font-size: 120%; background-color: #d9d9d9;">{{ $estimate->name }}</th>
                        @endforeach
                    @endif
                </tr>
                    @if ($form->type == App\Enums\Formtype::Field)
                        @foreach ($options["fields"] as $field_id)
                            @foreach ($allFields as $field)
                                @if ($field_id == $field->id)
                                    <tr>
                                        <td class="myTable" colspan="7" style="font-size: 115%; background-color: #d9d9d9;">
                                            <strong>{{ $field->name }}</strong>
                                        </td>
                                    </tr>
                                    @foreach ($field->competences as $comp)
                                    <tr>
                                        <td class="myTable" style="background-color: #d9d9d9;">
                                            {{ $a++ }}
                                        </td>
                                        <td class="myTable" style="font-size: 105%;"><b></b>{{ $comp->name }}</td>
                                        @foreach ($allEstimates as $estimate)
                                            <td class="myTable" style="text-align: center;">
                                                @foreach ($data["estimate"] as $key => $est)
                                                @if ($comp->id == $key && $estimate->id == $est)
                                                    &#10004;
                                                @endif
                                                @endforeach
                                            </td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                @endif
                            @endforeach
                        @endforeach
                    @endif
            </table>


        </div>
        <br><br>
        <div class="center" style="border-style: solid solid solid solid; width: 80%;">
            <br><br>
            <div class="center" style="border-style: solid solid solid solid; width: 80%;">
                <table>
                    <td>
                        @if ($data["dayanddate"] != null)
                        &nbsp;<strong class="myelement"> اليوم والتاريخ:</strong>&nbsp;&nbsp;&nbsp;&nbsp;<b class="myelement">{{ $data["day"]}}&nbsp;&nbsp;&nbsp;&nbsp;{{$data["dayanddate"] }}</b>
                        @endif
                    </td>
                    <td>
                        @if ($data["level"] != null)
                        <strong class="myelement"> المستوى:</strong>&nbsp;&nbsp;<b class="myelement">{{ $data["level"] }}</b>
                        @endif
                    </td>
                    <td>
                        @if ($data["childrencount"] != null)
                        <strong class="myelement center"> عدد الأطفال:</strong>&nbsp;&nbsp;<b class="myelement">{{ $data["childrencount"] }}</b>
                        @endif
                    </td>
                </table>
                <br>
                <table>
                    <td>
                        @if ($data["eduexp"] != null)
                        &nbsp;<strong class="myelement"> الخبرة التربوية:</strong>&nbsp;&nbsp;<b class="myelement">{{ $data["eduexp"] }}</b>
                        @endif
                    </td>
                    <td>
                        @if ($data["week"] != null)
                        <strong class="myelement"> الاسبوع:</strong>&nbsp;&nbsp;<b class="myelement">{{ $data["week"] }}</b>
                        @endif
                    </td>
                    <td >
                        @if ($data["period"] != null)
                        <strong class="myelement center"> الفترة:</strong>&nbsp;&nbsp;<b class="myelement">{{ $data["period"] }}</b>
                        @endif
                        @if ($data["activitytype"] != null)
                        <strong class="myelement center"> نوع النشاط:</strong>&nbsp;&nbsp;<b class="myelement">{{ $data["activitytype"] }}</b>
                        @endif
                    </td>
                </table>
                <br>
                <table>
                    <td style="width: 100%;">
                        @if ($data["general"] != null)
                        <strong class="myelement"> الهدف العام:</strong>&nbsp;&nbsp;<b class="myelement">{{ $data["general"] }}</b>
                        @endif
                    </td>
                </table>
                <br>
                <table>
                    <td style="width: 100%;">
                        @if ($data["goals"] != null)
                        <strong class="myelement" style="font-size: 150%;"> الأهداف السلوكية:</strong><br><br><b class="myelement">{{ $data["goals"] }}</b>
                        @endif
                    </td>
                </table>
            </div>
            <br>
            <br>
            @if ($data["activityshow"] != null)
                <div style="width: 80%;">
                    <table>
                        <tr>
                            <td>

                                    <strong class="myelement" style="font-size: 150%; margin-right: 10px;"> أسلوب عرض النشاط:</strong>

                            </td>
                        </tr>
                        <tr>
                            <td style="height: 150px">
                                <p class="myelement" style="margin-right: 10px;">{{ $data["activityshow"] }}</p>
                            </td>
                        </tr>
                    </table>
                </div>
            @endif

            @if ($data["activitygoals"] != null)
                <div style="width: 80%;">
                    <table>
                        <tr>
                            <td>

                                    <strong class="myelement" style="font-size: 150%; margin-right: 10px;"> الأهداف التي تم تحقيقها من خلال النشاط:</strong>

                            </td>
                        </tr>
                        <tr>
                            <td style="height: 150px">
                                <p class="myelement" style="margin-right: 10px;">{{ $data["activitygoals"] }}</p>
                            </td>
                        </tr>
                    </table>
                </div>
            @endif
            <div class="center" style="width: 80%;">
                <table class="center">
                    <tr>
                        <th>
                            @if ($data["report"] != null)
                                <strong class="myelement" style="font-size: 150%;"> تقرير وصفي مختصر:</strong>
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <td style="height: 150px">
                            <p class="myelement">{{ $data["report"] }}</p>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="width: 80%;">
                <table>
                    <tr>
                        <td>
                            @if ($data["note"] != null)
                                <strong class="myelement" style="font-size: 150%; margin-right: 10px;"> الملاحظات:</strong>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 150px">
                            <p class="myelement" style="margin-right: 10px;">{{ $data["note"] }}</p>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="center" style="width: 100%;">
                <table class="center">
                    <tr>
                        <th>
                            <strong class="myelement" style="font-size: 150%;">توقيع المعلمة</strong>
                        </th>
                        <th>
                            <strong class="myelement" style="font-size: 150%;">توقيع المشرفة الفنية</strong>
                        </th>
                        <th>
                            <strong class="myelement" style="font-size: 150%;">توقيع المديرة</strong>
                        </th>
                        <th>
                            <strong class="myelement" style="font-size: 150%;">توقيع الموجهة الفنية</strong>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            @if ($teachersign)
                                <img width="100" height="100" src="{{ asset('storage/' . $teachersign->signature->filename) }}" alt="توقيع المعلمة" class="w-full h-auto">
                            @else
                                <p>لايوجد توقيع</p>
                            @endif
                        </th>

                        <th>
                            @if ($user)
                                <img width="100" height="100" src="{{ asset('storage/' . $user->signature->filename) }}" alt="توقيع المشرفة الفنية" class="w-full h-auto">
                            @else
                                <p>لايوجد توقيع</p>
                            @endif
                        </th>

                        <th>
                            @if ($managersign)
                                <img width="100" height="100" src="{{ asset('storage/' . $managersign->signature->filename) }}" alt="توقيع المديرة" class="w-full h-auto">
                            @else
                                <p>لايوجد توقيع</p>
                            @endif
                        </th>

                        <th>
                            @if ($directorsign)
                                <img width="100" height="100" src="{{ asset('storage/' . $directorsign->signature->filename) }}" alt="توقيع الموجهة الفنية" class="w-full h-auto">
                            @else
                                <p>لايوجد توقيع</p>
                            @endif
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </body>
@endif
@if ($form->type == App\Enums\Formtype::Activity)
    <body class="center" style="width: 100%;  print-color-adjust: exact;" dir="rtl">
        <br><br><br>
        <div class="center" style="border-style: solid solid solid solid; width: 80%;">
            <br><br><br>
                <table class="center" style="border-style: solid solid solid solid; width: 95%;">
                    <tr style="background-color: #d9d9d9; "><th colspan="5" style="background-color: #d9d9d9; width: 95%;"><h3 style="text-align: center;">{{ $form->name }}</h3></th></tr>
                    <tr>
                        <th style="border-style: solid solid solid solid;"><strong class="myelement">اليوم والتاريخ</strong></th>
                        <th style="border-style: solid solid solid solid;"><strong class="myelement">اسم المعلمة</strong></th>
                        <th style="border-style: solid solid solid solid;"><strong class="myelement">المستوى - عدد الأطفال</strong></th>
                        <th style="border-style: solid solid solid solid;"><strong class="myelement">الخبرة التربوية - الأسبوع</th>
                        <th style="border-style: solid solid solid solid;"><strong class="myelement">اسم المهارة</strong></th>
                    </tr>
                    <tr>
                        <td style="text-align: center;border-style: solid solid solid solid;">
                            @if ($data["dayanddate"] != null)
                            <b class="myelement">{{ $data["day"]}}&nbsp;&nbsp;&nbsp;&nbsp;{{$data["dayanddate"] }}</b>
                            @endif
                        </td>
                        <td style="text-align: center;border-style: solid solid solid solid;">
                            @if ($data["teachername"] != null && $data["teachername"] == 1 )
                            <b class="myelement">{{ $teacher->name }}</b>
                            @endif
                        </td>
                        <td style="text-align: center;border-style: solid solid solid solid;">
                            @if ($data["level"] != null)
                            <b class="myelement">{{ $data["level"] }}
                                -
                                @if ($data["childrencount"] != null)
                                {{ $data["childrencount"] }}
                                @endif
                            </b>
                            @endif

                        </td>
                        <td style="text-align: center; border-style: solid solid solid solid;">
                            <b class="myelement">
                            @if ($data["eduexp"] != null)
                            {{ $data["eduexp"] }}
                                -


                            @endif
                            @if ($data["week"] != null)
                                {{ $data["week"] }}
                            @endif
                        </b>
                        </td>
                        <td style="text-align: center; border-style: solid solid solid solid;">
                            @if ($data["skillname"] != null)
                            <b class="myelement">{{ $data["skillname"] }}</b>
                            @endif
                        </td>
                    </tr>
                </table>
                <br><br><br>
            <table class="center myTable" style="width: 95%;">
                <tr>
                    <th class="myTable" width="10%" style="background-color: #d9d9d9; ">أجزاء الدرس</th>
                    <th class="myTable" width="30%" style="font-size: 120%; background-color: #d9d9d9;"><p><strong>الكفايات</strong></p></th>
                    @if ($form->type == App\Enums\Formtype::Activity)
                        @foreach ($allEstimatesgraded as $estimate)
                            <th class="myTable" width="60px" style="font-size: 120%; background-color: #d9d9d9;">{{ $estimate->name }} <br> {{"(". $estimate->grade.")" }}</th>
                        @endforeach
                    @endif
                </tr>
                    @if ($form->type == App\Enums\Formtype::Activity)
                        @foreach ($options["activities"] as $activity_id)
                            @foreach ($allActivities as $activity)
                                @if ($activity_id == $activity->id)
                                    <tr>
                                        <td rowspan="{{count($activity->competences)+1 }}" class="myTable" style="font-size: 115%; background-color: #d9d9d9; text-align: center;">
                                            <strong>{{ $activity->name }}<br>{{"(" . $activity->grade .")" }}</strong>
                                        </td>
                                    </tr>
                                    @foreach ($activity->competences as $comp)
                                    <tr>
                                        <td class="myTable" style="font-size: 105%;"><b></b>{{ $comp->name }}</td>
                                        @foreach ($allEstimatesgraded as $estimate)
                                            <td class="myTable" style="text-align: center;">
                                                @foreach ($data["estimate"] as $key => $est)
                                                @if ($comp->id == $key && $estimate->id == $est)
                                                    &#10004;
                                                @endif
                                                @endforeach
                                            </td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                @endif
                            @endforeach
                        @endforeach
                    @endif
            </table>


        </div>
        <br><br><br><br>
        <div class="center" style="border-style: solid solid solid solid; width: 80%;">

            <div style="width: 80%;">
                <table>
                    <tr>
                        <td>
                            @if ($data["note"] != null)
                                <strong class="myelement" style="font-size: 150%; margin-right: 10px;"> الملاحظات:</strong>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 150px">
                            <p class="myelement" style="margin-right: 10px;">{{ $data["note"] }}</p>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="width: 80%;">
                <table>
                    <tr>
                        <td>
                            @if ($data["recommendations"] != null)
                                <strong class="myelement" style="font-size: 150%; margin-right: 10px;"> التوصيات:</strong>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 150px">
                            <p class="myelement" style="margin-right: 10px;">{{ $data["recommendations"] }}</p>
                        </td>
                    </tr>
                </table>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div class="center" style="width: 100%;">
                <table class="center">
                    <tr>
                        <th>
                            <strong class="myelement" style="font-size: 150%;">توقيع المعلمة</strong>
                        </th>
                        <th>
                            <strong class="myelement" style="font-size: 150%;">توقيع المشرفة الفنية</strong>
                        </th>
                        <th>
                            <strong class="myelement" style="font-size: 150%;">توقيع المديرة</strong>
                        </th>
                        <th>
                            <strong class="myelement" style="font-size: 150%;">توقيع الموجهة الفنية</strong>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            @if ($teachersign)
                                <img width="100" height="100" src="{{ asset('storage/' . $teachersign->signature->filename) }}" alt="توقيع المعلمة" class="w-full h-auto">
                            @else
                                <p>لايوجد توقيع</p>
                            @endif
                        </th>

                        <th>
                            @if ($user)
                                <img width="100" height="100" src="{{ asset('storage/' . $user->signature->filename) }}" alt="توقيع المشرفة الفنية" class="w-full h-auto">
                            @else
                                <p>لايوجد توقيع</p>
                            @endif
                        </th>

                        <th>
                            @if ($managersign)
                                <img width="100" height="100" src="{{ asset('storage/' . $managersign->signature->filename) }}" alt="توقيع المديرة" class="w-full h-auto">
                            @else
                                <p>لايوجد توقيع</p>
                            @endif
                        </th>

                        <th>
                            @if ($directorsign)
                                <img width="100" height="100" src="{{ asset('storage/' . $directorsign->signature->filename) }}" alt="توقيع الموجهة الفنية" class="w-full h-auto">
                            @else
                                <p>لايوجد توقيع</p>
                            @endif
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </body>
@endif
@if ($form->type == App\Enums\Formtype::Competence)
    <body class="center" style="width: 100%;  print-color-adjust: exact;" dir="rtl">
        <?php
            $a = 1;
        ?>
        <div class="center" style="border-style: solid solid solid solid; width: 80%;">
            <br><br><br>
                <table class="center" style="border-style: solid solid solid solid; width: 95%;">
                    <tr style="background-color: #d9d9d9; "><th colspan="5" style="background-color: #d9d9d9; width: 95%;"><h3 style="text-align: center;">{{ $form->name }}</h3></th></tr>
                    <tr>
                        <th><strong class="myelementt">اليوم والتاريخ: </strong>&nbsp;                            @if ($data["dayanddate"] != null)
                            <b class="myelementt">{{ $data["day"]}}&nbsp;{{$data["dayanddate"] }}</b>
                            @endif
                        </th>
                        <th><strong class="myelementt">اسم المعلمة: </strong>&nbsp;                            @if ($data["teachername"] != null && $data["teachername"] == 1 )
                            <b class="myelementt">{{ $teacher->name }}</b>
                            @endif
                        </th>
                        <th><strong class="myelementt">المستوى: </strong>&nbsp;@if ($data["level"] != null)
                            <b class="myelementt">{{ $data["level"] }} </b>
                            @endif</th>
                        <th><strong class="myelementt">عدد الأطفال: </strong>&nbsp;@if ($data["childrencount"] != null)

                            <b class="myelementt">{{ $data["childrencount"] }}</b>

                            @endif</th>
                    </tr>
                    <tr>
                        <th><strong class="myelementt">الخبرة التربوية:  </strong>&nbsp;@if ($data["eduexp"] != null)
                            {{ $data["eduexp"] }} @endif
                        </th>
                        <th><strong class="myelementt">الاسبوع:  </strong>&nbsp;@if ($data["week"] != null)
                            {{ $data["week"] }}
                        @endif
                        </th>
                        <th colspan="2"><strong class="myelementt">اسم القصة أو الفيلم التعليمي:  </strong>&nbsp;@if ($data["filmname"] != null)
                            <b class="myelementt">{{ $data["filmname"] }}</b>
                            @endif
                        </th>
                    </tr>

                </table>
                <br><br><br><br><br><br>
            <table class="center myTable" style="width: 95%;">
                <tr>
                    <th class="myTable" width="1%" style="background-color: #d9d9d9;">م</th>
                    <th class="myTable" width="65%" style="font-size: 120%; background-color: #d9d9d9;"><p><strong>الكفايات</strong></p></th>
                    @if ($form->type == App\Enums\Formtype::Competence)
                        @foreach ($allEstimates as $estimate)
                            <th class="myTable" width="10%" style="font-size: 120%; background-color: #d9d9d9;">{{ $estimate->name }}</th>
                        @endforeach
                    @endif
                </tr>
                    @if ($form->type == App\Enums\Formtype::Competence)
                        @foreach ($options["competences"] as $competence_id)
                            @foreach ($allCompetences as $competences)
                                @if ($competence_id == $competences->id)
                                    <tr>
                                        <td class="myTable" style="background-color: #d9d9d9;">
                                            {{ $a++ }}
                                        </td>
                                        <td class="myTable" style="font-size: 115%;">
                                            <strong>{{ $competences->name }}</strong>
                                        </td>
                                        @foreach ($allEstimates as $estimate)
                                            <td class="myTable" style="text-align: center;">
                                                @foreach ($data["estimate"] as $key => $est)
                                                @if ($competences->id == $key && $estimate->id == $est)
                                                    &#10004;
                                                @endif
                                                @endforeach
                                            </td>
                                        @endforeach
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    @endif
            </table>

        <br><br><br><br>


            <div style="width: 80%;">
                <table>
                    <tr>
                        <td>
                            @if ($data["note"] != null)
                                <strong class="myelement" style="font-size: 150%; margin-right: 10px;"> الملاحظات:</strong>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 150px">
                            <p class="myelement" style="margin-right: 10px;">{{ $data["note"] }}</p>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="width: 80%;">
                <table>
                    <tr>
                        <td>
                            @if ($data["recommendations"] != null)
                                <strong class="myelement" style="font-size: 150%; margin-right: 10px;"> التوصيات:</strong>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 150px">
                            <p class="myelement" style="margin-right: 10px;">{{ $data["recommendations"] }}</p>
                        </td>
                    </tr>
                </table>
            </div>
            <br><br><br><br>
            <div class="center" style="width: 100%;">
                <table class="center">
                    <tr>
                        <th>
                            <strong class="myelement" style="font-size: 150%;">توقيع المعلمة</strong>
                        </th>
                        <th>
                            <strong class="myelement" style="font-size: 150%;">توقيع المشرفة الفنية</strong>
                        </th>
                        <th>
                            <strong class="myelement" style="font-size: 150%;">توقيع المديرة</strong>
                        </th>
                        <th>
                            <strong class="myelement" style="font-size: 150%;">توقيع الموجهة الفنية</strong>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            @if ($teachersign)
                                <img width="100" height="100" src="{{ asset('storage/' . $teachersign->signature->filename) }}" alt="توقيع المعلمة" class="w-full h-auto">
                            @else
                                <p>لايوجد توقيع</p>
                            @endif
                        </th>

                        <th>
                            @if ($user)
                                <img width="100" height="100" src="{{ asset('storage/' . $user->signature->filename) }}" alt="توقيع المشرفة الفنية" class="w-full h-auto">
                            @else
                                <p>لايوجد توقيع</p>
                            @endif
                        </th>

                        <th>
                            @if ($managersign)
                                <img width="100" height="100" src="{{ asset('storage/' . $managersign->signature->filename) }}" alt="توقيع المديرة" class="w-full h-auto">
                            @else
                                <p>لايوجد توقيع</p>
                            @endif
                        </th>

                        <th>
                            @if ($directorsign)
                                <img width="100" height="100" src="{{ asset('storage/' . $directorsign->signature->filename) }}" alt="توقيع الموجهة الفنية" class="w-full h-auto">
                            @else
                                <p>لايوجد توقيع</p>
                            @endif
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </body>
@endif
</html>
