@extends('layout')

@section('title',__('Panagora'))

@push('css')
<style>
    /* Personalizar layout*/
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <span>@lang('API-ASSEMBLEIA')</span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered"  >
                        <thead>
                          <tr>
                            <td>ID</td>
                            <td>@lang('Nome')</td>
                            <td>@lang('Nome do Evento')</td>
                            <td>@lang('Codigo do Evento')</td>
                            <td colspan="3" class="text-center">@lang('Ações')</td>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                            @foreach ($assembleiacases as $case)
                                <td>{{$case->id}}</td>
                                <td>{{$case->nome}}</td>
                                <td>{{$case->nome_evento}}</td>
                                <td>{{$case->codigo_evento}}</td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('gerar.geraPdf', $case->id)}}"
                                    class="btn btn-primary btn-sm">@lang('Imprimir')
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    {{ $assembleiacases->links() }}
</div>

@endsection
