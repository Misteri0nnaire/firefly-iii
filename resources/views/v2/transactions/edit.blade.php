@extends('layout.v2')
@section('scripts')
    @vite(['src/pages/transactions/edit.js'])
@endsection
@section('content')
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid" x-data="transactions" id="form">
            <x-messages></x-messages>
            <x-transaction-tab-list></x-transaction-tab-list>
            <div class="tab-content" id="splitTabsContent">
                <template x-for="transaction,index in entries">
                    <x-transaction-split
                        :zoomLevel="$zoomLevel"
                        :latitude="$latitude"
                        :longitude="$longitude"
                        :optionalFields="$optionalFields"
                        :optionalDateFields="$optionalDateFields"></x-transaction-split>
                </template>
            </div>
        </div>
        <div class="form-group mt-3">
            <label for="piggy_bank_id">Piggy Bank</label>
            <select x-model="entries[index].piggy_bank_id" id="piggy_bank_id" class="form-select">
                <option value="">Aucun</option>
                <template x-for="pb in piggyBanks">
                    <option :value="pb.id" x-text="pb.name"></option>
                </template>
            </select>
        </div>
    </div>

@endsection
