<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Bus\Batchable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\SerializesModels;

class GetVehicleData implements ShouldQueue
{
    use Batchable,Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $data;
    public $fileName;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data,$fileName)
    {
        $this->data = $data;
        $this->fileName = $fileName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->data as $record)
        {
            // appendToSqlFile(, $listData);
            $sql = "INSERT INTO vehicles (id,chasisnum,registration_number,enginenum,allocation,agreementid,username,admin,emi_amt,pos,tbr,bkts,productname,model,address,add_by,add_by_name,status) VALUES ('$record->id','$record->chasisnum','$record->registration_number','$record->enginenum,'$record->allocation','$record->agreementid','$record->username','$record->admin','$record->emi_amt','$record->pos','$record->tbr','$record->bkts','$record->productname','$record->model','$record->address','$record->add_by','$record->add_by_name','$record->status');";

            // Append the SQL statement to the file
            Storage::disk('public')->append($this->fileName, $sql);
        }

        response()->download(public_path("vehicleData/$this->fileName"));
    }
}
