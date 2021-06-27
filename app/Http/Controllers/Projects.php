<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custom\CartoModel;
use App\Custom\ProjectsDatasets;
use App\Custom\Breadcrumbs;


class Projects extends Controller
{
    /**
     * Show districts main view.
     *
     * @return \Illuminate\View\View
     */
    public function main()
    {
		$ds = new ProjectsDatasets();
		$details = $ds->get('main');
		$model = new CartoModel(config('apis.carto_entry'), config('apis.carto_key'));
        return view('projects', [
					'breadcrumbs' => Breadcrumbs::projects(),
					//'slist' => $ds->list,
					'url' => $model->url("SELECT * FROM {$details['table']} ORDER BY \"PROJECT_ID\", \"PUB_DATE\" DESC"),
					'details' => $details,
				]);
    }
}
