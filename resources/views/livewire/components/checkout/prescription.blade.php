<div class="flex flex-col justify-between space-y-10">
    @include('components.checkout-steps')

    <form wire:submit.prevent="save" class="space-y-5">
        @if ($errors->any())
            <div class="p-4 border-l-4 border-red-400 bg-red-50">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-red-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <ul class="text-sm text-red-700 list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <div class="max-w-lg mx-auto lg:max-w-none space-y-6">

            <div>
                <label class="block text-sm font-medium text-gray-700">{{ __('First Name') }}</label>
                <input wire:model="first_name" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">{{ __('Last Name') }}</label>
                <input wire:model="last_name" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                <input wire:model="email" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">{{ __('Date of Birth') }}</label>
                <input type="date" wire:model="dob" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">{{ __('Biological Sex') }}</label>
                <select wire:model="sex" class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                    <option value="">Select...</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">{{ __('Height (cm)') }}</label>
                    <input type="number" wire:model="height" min="50" max="250" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">{{ __('Weight (kg)') }}</label>
                    <input type="number" wire:model="weight" min="20" max="300" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">{{ __('Blood Pressure') }}</label>
                <select wire:model="bloodPressure" class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                    <option value="">Select...</option>
                    <option>Low 90/60</option>
                    <option>Normal 90/60-120/80</option>
                    <option>High 140/90</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">{{ __('Do you consume alcohol?') }}</label>
                <select wire:model="alcohol" class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                    <option value="">Select...</option>
                    <option>Never</option>
                    <option>Occasionally</option>
                    <option>Frequently</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">{{ __('Do you smoke?') }}</label>
                <select wire:model="smoke" class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                    <option value="">Select...</option>
                    <option>No</option>
                    <option>Occasionally</option>
                    <option>Daily</option>
                </select>
            </div>

            @if($hasErectilePrematureCategory)
                <div class="pt-6 border-t border-gray-200">
                    <h2 class="text-lg font-semibold text-red-700">{{ __('Important Information for ED/PE Treatment') }}</h2>

                    <label class="block mt-4 text-sm text-gray-700">
                        <input type="checkbox" wire:model="acknowledgements" value="hasErectilePrematureCategory_summary" class="mr-2 border-gray-300">
                        {{ __('I confirm that I have read and understand the medical disclaimer and eligibility criteria.') }}
                    </label>

                    <div class="mt-2 text-sm text-gray-600">
                        <ul class="list-disc pl-6">
                            <li>You have difficulty getting or maintaining an erection.</li>
                            <li>Your sexual desire or satisfaction has decreased in the past 6 months.</li>
                            <li>You experience premature ejaculation (within 5 minutes of penetration).</li>
                            <li>You are able to walk for 3–5 minutes or climb stairs without breathlessness or chest discomfort.</li>
                            <li>You are currently taking any of the following medications:</li>
                            <ul class="list-disc pl-8">
                                <li>Nitrates (e.g., glyceryl trinitrate, isosorbide dinitrate/mononitrate, GTN spray/gel, nicorandil)</li>
                                <li>HIV medications (e.g., ritonavir, indinavir)</li>
                                <li>Riociguat (for pulmonary hypertension)</li>
                                <li>Antifungal medications (e.g., ketoconazole, itraconazole)</li>
                                <li>Recreational drugs such as amyl nitrate (“poppers”)</li>
                                <li>Alpha-blockers (e.g., alfuzosin, doxazosin, tamsulosin)</li>
                                <li>Vericiguat</li>
                            </ul>
                            <li>You will not use more than one erectile dysfunction medication at a time (e.g., Viagra, Cialis, Levitra).</li>
                            <li>You will read the medication leaflet carefully before use.</li>
                            <li>You are over 18 years old and using this treatment only for yourself.</li>
                            <li>You have answered all questions truthfully and accept full responsibility for your answers.</li>
                            <li>You will inform your general practitioner about this treatment.</li>
                            <li>You are aware of possible side effects, how the treatment works, and available alternatives.</li>
                        </ul>
                    </div>
                </div>
            @endif

            @if($hasGeneralMedicinesCategory)
                <div class="pt-6 border-t border-gray-200">
                    <h2 class="text-lg font-semibold text-blue-700">{{ __('General Medication Information') }}</h2>

                    <label class="block mt-4 text-sm text-gray-700">
                        <input type="checkbox" wire:model="acknowledgements" value="hasGeneralMedicinesCategory_summary" class="mr-2 border-gray-300">
                        {{ __('I confirm that I have read and understand the medical disclaimer and eligibility criteria.') }}
                    </label>
                </div>
            @endif

            @if($hasSteroidsMedicinesCategory)
                <div class="pt-6 border-t border-gray-200">
                    <h2 class="text-lg font-semibold text-yellow-700">{{ __('Steroids Usage Disclaimer') }}</h2>

                    <label class="block mt-4 text-sm text-gray-700">
                        <input type="checkbox" wire:model="acknowledgements" value="hasSteroidsMedicinesCategory_summary" class="mr-2 border-gray-300">
                        {{ __('I confirm that I have read and understand the medical disclaimer and eligibility criteria.') }}
                    </label>

                    <div class="mt-2 text-sm text-gray-600">
                        <ul class="list-disc pl-6">
                            <li>You have symptoms commonly associated with low testosterone (e.g., low libido, fatigue, reduced muscle mass, depressed mood, erectile dysfunction).</li>
                            <li>Your testosterone levels have been evaluated or you are experiencing consistent signs of hormonal deficiency.</li>
                            <li>You do not have a history of hormone-sensitive cancers (e.g., prostate or breast cancer).</li>
                            <li>You do not have untreated severe sleep apnea or high hematocrit levels.</li>
                            <li>You do not have serious heart, liver, or kidney disease.</li>
                            <li>You are not currently taking any of the following medications or substances that may interact with testosterone therapy:</li>
                            <ul class="list-disc pl-8">
                                <li>Corticosteroids (e.g., prednisone, dexamethasone)</li>
                                <li>Insulin or antidiabetic medications (e.g., metformin, glimepiride)</li>
                                <li>Blood thinners (e.g., warfarin)</li>
                                <li>Anabolic steroids or other hormone therapies</li>
                                <li>Certain psychiatric medications (e.g., antipsychotics, lithium)</li>
                            </ul>
                            <li>You are not currently taking any of the following medications or substances that may interact with testosterone therapy:</li>
                            <ul class="list-disc pl-8">
                                <li>Blood clots</li>
                                <li>Enlarged prostate</li>
                                <li>Sleep apnea worsening</li>
                                <li>Acne or oily skin</li>
                                <li>Breast tenderness or enlargement</li>
                            </ul>
                            <li>You will undergo regular monitoring of testosterone levels, prostate health, red blood cell counts, and liver function.</li>
                            <li>You will not use more than the prescribed dose or combine multiple forms of testosterone.</li>
                            <li>You will read and follow the medication guide or patient leaflet provided with the treatment.</li>
                            <li>You are over 18 years old and using this treatment only for yourself.</li>
                            <li>You have answered all questions truthfully and accept full responsibility for your answers.</li>
                            <li>You will inform your general practitioner about this treatment.</li>
                            <li>You are aware of possible side effects, how the treatment works, and available alternatives.</li>
                        </ul>
                    </div>
                </div>
            @endif

            @if($hasWeightLossCategory)
                <div class="pt-6 border-t border-gray-200">
                    <h2 class="text-lg font-semibold text-green-700">{{ __('Weight Loss Treatment Notice') }}</h2>

                    <label class="block mt-4 text-sm text-gray-700">
                        <input type="checkbox" wire:model="acknowledgements" value="hasWeightLossCategory_summary" class="mr-2 border-gray-300">
                        {{ __('I confirm that I have read and understand the medical disclaimer and eligibility criteria.') }}
                    </label>

                    <div class="mt-2 text-sm text-gray-600">
                        <ul class="list-disc pl-6">
                            <li>You are overweight or obese (BMI ≥ 25) and are seeking support for weight reduction.</li>
                            <li>You have made or are willing to make lifestyle changes such as healthier eating, increased physical activity, and behavior modification.</li>
                            <li>You are not currently pregnant, planning to become pregnant, or breastfeeding.</li>
                            <li>You do not have a history of eating disorders (e.g., anorexia, bulimia, binge eating disorder).</li>
                            <li>You do not have untreated or unstable mental health conditions (e.g., severe depression, anxiety, psychosis).</li>
                            <li>You do not have a history of pancreatitis or severe gastrointestinal disease (if considering GLP-1 medications like Saxenda, Wegovy, Mounjaro).</li>
                            <li>You are not currently taking any of the following medications:</li>
                            <ul class="list-disc pl-8">
                                <li>Nitrates (e.g., glyceryl trinitrate, isosorbide dinitrate/mononitrate)</li>
                                <li>Serotonergic drugs (e.g., sertraline, fluoxetine, venlafaxine, tramadol, sumatriptan, MDMA)</li>
                                <li>Monoamine oxidase inhibitors (MAOIs)</li>
                                <li>Certain antipsychotics (e.g., olanzapine, risperidone)</li>
                                <li>Steroids (long-term use)</li>
                                <li>Other weight loss medications not prescribed in this treatment plan</li>
                            </ul>
                            <li>You understand that treatment may cause side effects, such as:</li>
                            <ul class="list-disc pl-8">
                                <li>Nausea, vomiting, or diarrhea</li>
                                <li>Constipation or abdominal discomfort</li>
                                <li>Headache or fatigue</li>
                                <li>Risk of low blood sugar (especially if diabetic or on insulin)</li>
                                <li>Rare but serious risks (e.g., thyroid tumors, gallbladder issues)</li>
                            </ul>
                            <li>You will not combine multiple weight loss medications unless specifically advised by a doctor.</li>
                            <li>You will follow a balanced diet and engage in regular physical activity during treatment.</li>
                            <li>You are over 18 years old and the medication is for your personal use only.</li>
                            <li>You have answered all health-related questions truthfully and accept full responsibility for your answers.</li>
                            <li>You will inform your general practitioner or specialist about this treatment.</li>
                            <li>You are aware of the potential benefits, side effects, and alternative treatment options.</li>
                        </ul>
                    </div>
                </div>
            @endif

            @if($hasBirthControlCategory)
                <div class="pt-6 border-t border-gray-200">
                    <h2 class="text-lg font-semibold text-purple-700">{{ __('Birth Control Usage Terms') }}</h2>

                    <label class="block mt-4 text-sm text-gray-700">
                        <input type="checkbox" wire:model="acknowledgements" value="hasBirthControlCategory_summary" class="mr-2 border-gray-300">
                        {{ __('I confirm that I have read and understand the medical disclaimer and eligibility criteria.') }}
                    </label>

                    <div class="mt-2 text-sm text-gray-600">
                        <ul class="list-disc pl-6">
                            <li>You are seeking hormonal birth control for contraceptive purposes or menstrual regulation.</li>
                            <li>You are not currently pregnant and have not had unprotected sex in the past 5 days without using emergency contraception.</li>
                            <li>You do not have a history of blood clots, stroke, or heart attack.</li>
                            <li>You do not suffer from migraine with aura, especially if considering combined pills (estrogen + progestin).</li>
                            <li>You do not have liver disease, breast cancer, or any condition sensitive to hormonal fluctuations.</li>
                            <li>You do not smoke or, if you do, you are under 35 years old (smoking + estrogen increases risk of serious side effects).</li>
                            <li>You are not currently taking any of the following medications that may reduce contraceptive effectiveness:</li>
                            <ul class="list-disc pl-8">
                                <li>Rifampin (antibiotic)</li>
                                <li>Certain antiepileptics (e.g., carbamazepine, phenytoin, topiramate)</li>
                                <li>HIV medications (e.g., ritonavir)</li>
                                <li>St. John’s Wort</li>
                                <li>Antifungals (e.g., griseofulvin)</li>
                            </ul>
                            <li>You understand that side effects may occur, including:</li>
                            <ul class="list-disc pl-8">
                                <li>Nausea, headaches, breast tenderness, or spotting between periods</li>
                                <li>Mood changes or lowered libido</li>
                                <li>Slightly increased risk of blood clots (especially with combined pills)</li>
                            </ul>
                            <li>You agree to take the pill as directed (daily at the same time for maximum effectiveness).</li>
                            <li>You understand that missing pills, vomiting, or diarrhea can reduce effectiveness.</li>
                            <li>You understand that hormonal contraceptives do not protect against sexually transmitted infections (STIs).</li>
                            <li>You are over 18 years old and using this medication solely for yourself.</li>
                            <li>You have answered all questions truthfully and accept full responsibility for your responses.</li>
                            <li>You will inform your general practitioner or gynecologist about this treatment.</li>
                            <li>You are aware of the benefits, risks, and available alternative contraceptive options (e.g., IUD, patch, injection, condoms).</li>
                        </ul>
                    </div>
                </div>
            @endif
        </div>

        <div class="pt-6 mt-10 border-t border-gray-200 sm:flex sm:items-center sm:justify-end">
            <x-buttons.submit
                :title="__('Continue')"
                class="w-full px-8 py-2 text-sm sm:w-auto"
                wire:loading.attr="data-loading"
            />
        </div>
    </form>
</div>
