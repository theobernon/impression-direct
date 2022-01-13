<table class="table table-bordered table-striped datatable">
    <thead>
    <tr>
        <th>{{__('Référence')}}</th>
        <th>{{__('Email')}}</th>
        <th>{{__('Nom')}}</th>
        <th>{{__('Prénom')}}</th>
        <th>{{__('Société')}}</th>
        <th>{{__('Téléphone Fixe')}}</th>
        <th>{{__('Téléphone Mobile')}}</th>
        <th>{{__('Fax')}}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
{{--    @foreach($clients as $client)--}}
{{--        <tr>--}}
{{--            <td>--}}
{{--                <x-buttons.show :item="$customer">--}}
{{--                    {{$customer->name}}--}}
{{--                </x-buttons.show>--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                <x-address address="{{$customer->address}}" postalCode="{{$customer->postalCode}}" city="{{$customer->city}}">--}}
{{--                </x-address>--}}
{{--            </td>--}}
{{--            <td>{{$customer->email}}</td>--}}
{{--            <td>--}}
{{--                <a href="{{$customer->url}}">--}}
{{--                    {{$customer->url}}--}}
{{--                </a>--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                <x-buttons.show :item="$customer"></x-buttons.show>--}}
{{--                <x-buttons.edit :item="$customer"></x-buttons.edit>--}}
{{--                <x-buttons.delete :item="$customer"></x-buttons.delete>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
    </tbody>
</table>
