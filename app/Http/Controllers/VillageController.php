<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVillageRequest;
use App\Http\Requests\StoreVillageRequest;
use App\Http\Requests\UpdateVillageRequest;
use App\Village;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VillageController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('village_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Village::with(['district'])->select(sprintf('%s.*', (new Village)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'village_show';
                $editGate = 'village_edit';
                $deleteGate = 'village_delete';
                $crudRoutePart = 'villages';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('district_name', function ($row) {
                return $row->district ? $row->district->name : '';
            });

            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : "";
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'district']);

            return $table->make(true);
        }

        $districts = District::get();

        return view('admin.villages.index', compact('districts'));
    }

    public function create()
    {
        abort_if(Gate::denies('village_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.villages.create', compact('districts'));
    }

    public function store(StoreVillageRequest $request)
    {
        $village = Village::query()->create($request->all());

        return redirect()->route('admin.villages.index');
    }

    public function edit(Village $village)
    {
        abort_if(Gate::denies('village_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $village->load('district');

        return view('admin.villages.edit', compact('districts', 'village'));
    }

    public function update(UpdateVillageRequest $request, Village $village)
    {
        $village->update($request->all());

        return redirect()->route('admin.villages.index');
    }

    public function show(Village $village)
    {
        abort_if(Gate::denies('village_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $village->load('district');

        return view('admin.villages.show', compact('village'));
    }

    public function destroy(Village $village)
    {
        abort_if(Gate::denies('village_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $village->delete();

        return back();
    }

    public function massDestroy(MassDestroyVillageRequest $request)
    {
        Village::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
