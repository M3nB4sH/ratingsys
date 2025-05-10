<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('انشاء تقييم للمعلمة') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('انشاء تقييم جديد للمعلمة') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div>
        <a href="{{ route("rating.index") }}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            الخلف
        </a>
        <div class="w-150">
            <form wire:submit="submit" class="mt-6 space-y-6">

                @if (array_key_exists("dayanddate", $formOptions))
                    @if ($formOptions["dayanddate"] == "1")
                    <flux:input
                        wire:model="dayanddate"
                        :label="__('التاريخ واليوم')"
                        type="date"
                        data-date-format="Y-m-d"
                        value='{{ date("Y-m-d") }}'
                        required
                    />
                    @endif
                @endif
                <flux:select wire:model="teachername" :label="__('اسم المعلمة')">
                    @foreach ($allTeachers as $item)
                        <flux:select.option value="{{ $item->id }}" wire:key="{{ $item->id }}">
                            {{ $item->name }}
                        </flux:select.option>
                    @endforeach
                </flux:select>
                @if (array_key_exists("level", $formOptions))
                    @if ($formOptions["level"] == "1")
                    <flux:select wire:model="level" :label="__('المستوى')">
                        @foreach ($allLevels as $item)
                            <flux:select.option value="{{ $item->name }}" wire:key="{{ $item->name }}">
                                {{ $item->name }}
                            </flux:select.option>
                        @endforeach
                    </flux:select>
                    @endif
                @endif
                @if (array_key_exists("childrencount", $formOptions))
                    @if ($formOptions["childrencount"] == "1")
                        <flux:input wire:model="childrencount" label="عدد الاطفال"/>
                    @endif
                @endif
                @if (array_key_exists("eduexp", $formOptions))
                    @if ($formOptions["eduexp"] == "1")

                        <flux:select wire:model="eduexp" label="الخبرة التربوية">
                            @foreach ($allEduexps as $item)
                                <flux:select.option value="{{ $item->name }}" wire:key="{{ $item->name }}">
                                    {{ $item->name }}
                                </flux:select.option>
                            @endforeach
                        </flux:select>

                    @endif
                @endif
                @if (array_key_exists("week", $formOptions))
                    @if ($formOptions["week"] == "1")
                    <flux:select wire:model="week" :label="__('الاسبوع')">
                        @foreach ($allWeeks as $item)
                            <flux:select.option value="{{ $item->name }}" wire:key="{{ $item->name }}">
                                {{ $item->name }}
                            </flux:select.option>
                        @endforeach
                    </flux:select>
                    @endif
                @endif
                @if (array_key_exists("period", $formOptions))
                    @if ($formOptions["period"] == "1")
                    <flux:select wire:model="period" :label="__('الفترة')">
                        @foreach ($allPeriods as $item)
                            <flux:select.option value="{{ $item->name }}" wire:key="{{ $item->name }}">
                                {{ $item->name }}
                            </flux:select.option>
                        @endforeach
                    </flux:select>
                    @endif
                @endif
                @if (array_key_exists("activitytype", $formOptions))
                    @if ($formOptions["activitytype"] == "1")
                        <flux:input wire:model="activitytype" label="نوع النشاط"/>
                    @endif
                @endif
                @if (array_key_exists("general", $formOptions))
                    @if ($formOptions["general"] == "1")
                        <flux:input wire:model="general" label="الهدف العام"/>
                    @endif
                @endif
                @if (array_key_exists("filmname", $formOptions))
                    @if ($formOptions["filmname"] == "1")
                        <flux:input wire:model="filmname" label="اسم القصة أو الفيلم التعليمي"/>
                    @endif
                @endif
                @if (array_key_exists("skillname", $formOptions))
                    @if ($formOptions["skillname"] == "1")
                        <flux:input wire:model="skillname" label="اسم المهارة"/>
                    @endif
                @endif
                @if (array_key_exists("activities", $formOptions))
                    @if ($formOptions["activities"])
                        @foreach ( $formOptions["activities"] as $item)
                            @foreach ( $allActivities as $activity)
                                @if ($activity->id == $item)
                                <flux:label>{{ $activity->name }}</flux:label>
                                <br>
                                    @foreach ($activity->competences as $key => $comp)
                                        @if ($comp->is_graded)
                                        <flux:label>{{ $comp->name }}</flux:label>
                                        <flux:select wire:model="estimate.{{ $comp->id }}">
                                            <flux:select.option value="0" wire:key="0">
                                                فارغ
                                            </flux:select.option>
                                            @foreach ($allEstimatesGrade as $estimate)
                                                <flux:select.option value="{{ $estimate->id }}" wire:key="{{ $estimate->id }}">
                                                    {{ $estimate->name }}
                                                </flux:select.option>
                                            @endforeach
                                        </flux:select>
                                        @endif

                                    @endforeach
                                @endif
                            @endforeach
                        @endforeach
                    @endif
                @endif
                @if (array_key_exists("fields", $formOptions))
                    @if ($formOptions["fields"])
                        @foreach ( $formOptions["fields"] as $item)
                            @foreach ( $allFields as $field)
                                @if ($field->id == $item)
                                <flux:label>{{ $field->name }}</flux:label>
                                <br>
                                    @foreach ($field->competences as $key => $comp)
                                        @if ($comp->is_graded == 0)
                                        <flux:label>{{ $comp->name }}</flux:label>
                                        <flux:select wire:model="estimate.{{ $comp->id }}">
                                            <flux:select.option value="0" wire:key="0">
                                                فارغ
                                            </flux:select.option>
                                            @foreach ($allEstimates as $estimate)
                                                <flux:select.option value="{{ $estimate->id }}" wire:key="{{ $estimate->id }}">
                                                    {{ $estimate->name }}
                                                </flux:select.option>
                                            @endforeach
                                        </flux:select>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endforeach
                    @endif
                @endif
                @if (array_key_exists("competences", $formOptions))
                    @if ($formOptions["competences"])
                        @foreach ( $formOptions["competences"] as $item)
                            @foreach ( $allCompetencies as $competence)
                                @if ($competence->id == $item)
                                <flux:label>{{ $competence->name }}</flux:label>
                                <br>
                                        @if ($competence->is_graded == 0)
                                        <flux:select wire:model="estimate.{{ $competence->id }}">
                                            <flux:select.option value="0" wire:key="0">
                                                فارغ
                                            </flux:select.option>
                                            @foreach ($allEstimates as $estimate)
                                                <flux:select.option value="{{ $estimate->id }}" wire:key="{{ $estimate->id }}">
                                                    {{ $estimate->name }}
                                                </flux:select.option>
                                            @endforeach
                                        </flux:select>
                                        @endif
                                @endif
                            @endforeach
                        @endforeach
                    @endif
                @endif
                @if (array_key_exists("goals", $formOptions))
                    @if ($formOptions["goals"] == "1")
                    <flux:textarea label="الأهداف السلوكية" wire:model="goals" name="goals" />
                    @endif
                @endif
                @if (array_key_exists("activityshow", $formOptions))
                    @if ($formOptions["activityshow"] == "1")
                    <flux:textarea label="أسلوب عرض النشاط" wire:model="activityshow" name="activityshow" />
                    @endif
                @endif
                @if (array_key_exists("activitygoals", $formOptions))
                    @if ($formOptions["activitygoals"] == "1")
                    <flux:textarea label="الأهداف التي تم تحقيقها من خلال النشاط" wire:model="activitygoals" name="activitygoals" />
                    @endif
                @endif
                @if (array_key_exists("report", $formOptions))
                    @if ($formOptions["report"] == "1")
                    <flux:textarea label="تقرير وصفي مختصر" wire:model="report" name="report" />
                    @endif
                @endif
                @if (array_key_exists("note", $formOptions))
                    @if ($formOptions["note"] == "1")

                        <flux:textarea label="الملاحظات" wire:model="note" name="note" />


                    @endif
                @endif
                @if (array_key_exists("recommendations", $formOptions))
                    @if ($formOptions["recommendations"] == "1")

                        <flux:textarea label="التوصيات" wire:model="recommendations" />


                    @endif
                @endif
                <flux:input wire:model="form_id" hidden/>
                <flux:button type="submit" variant="primary">تقييم</flux:button>
            </form>
        </div>
    </div>
</div>
