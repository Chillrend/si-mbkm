<style>
.button {
  border: none;
  color: white;
  padding: 15px 28px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 8px 4px 12px 15px;
  cursor: pointer;
}

.button1 {background-color: #4CAF50;}
.button2 {background-color: #F3490E;}
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold/ text-xl text-gray-800 leading-tight">
            {{ __('Status Pedaftaran Kegiatan MBKM') }}
        </h2>
    </x-slot>

    @if($mhsw_mbkm_exist == FALSE)
    <section class=" py-1 bg-blueGray-50">
    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="rounded-t bg-white mb-0 px-6 py-6">
                <div class="text-center flex justify-between">
                    <h6 class="text-blueGray-700 text-xl font-bold">
                        Pengisian Logbook
                    </h6>
                    <a href="{{url("/mbkm/daftar")}}" class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                        Daftar Kegiatan MBKM
                    </a>
                </div>
            </div>
            <div class="flex-auto bg-gray-100 px-4 lg:px-10 py-10 pt-0 mt-6">
                <h2 class="text-center text-xl mt-3">Anda belum mendaftar kegiatan MBKM. Anda dapat mendaftar dengan menekan tombol diatas </h2>
            </div>
        </div>
    </div>
    </section>
    @else
    <section class="py-1 bg-blueGray-50">
        <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold">
                            Log Book Kegiatan MBKM
                        </h6>
                        <a href="{{url("/logbook/form")}}" class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                            Tambahkan Entri Log Book
                        </a>
                    </div>
                </div>
                <div class="flex-auto bg-gray-100 px-4 lg:px-10 py-10 pt-0 mt-6">
                    <div class="w-full lg:w-4/8 px-2 mx-auto mt-4 "style="border-radius: 30px 30px 30px 30px;">
                        @if($logbook->first())
                            @foreach($logbook as $logbook)
                            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0" >
                                <div class="rounded-t mb-0 px-3 py-3" style="background-color: Aquamarine;">
                                    <div class="text-center flex justify-between">
                                    <b>{{$logbook->tanggal_log}}</b>
                                    <b>Tempat : {{$logbook->tempat}}</b>
                                    </div>
                                </div>
                                    <b class="rounded-t mb-1 ml-4 mr-4 mt-4">Uraian</b>
                                    <p class="rounded-t mb-0 ml-4 mr-4" >{{$logbook->uraian}}</p>
                                    </br>
                                    <b class="rounded-t mb-1 ml-4 mr-4 ">Pencapaian</b>
                                    <p class="rounded-t mb-4 ml-4 mr-4">{{$logbook->rencana_pencapaian}}</p>
                                <div>
                                    @if($logbook->approved_by_dosen == 1)
                                        <button class="button button1" disabled>Approved by dosen</button>
                                    @else
                                        <button class="button button2" disabled>Not aproved by dosen</button>
                                    
                                    @endif
                                    @if($logbook->approved_by_pembimbing == 1)
                                        <button class="button button1" disabled>Approved by pembimbing</button>
                                    @else
                                        <button class="button button2" disabled>Not aproved by pembimbing</button>
                                    
                                    @endif
                                </div>

                            </div>
                            @endforeach
                        @else
                        <h2 class="text-center text-xl mt-3">Anda belum  entri log book kegiatan MBKM, silahkan klik tombol diatas untuk menambah entri.</h2>
                    @endif
                </div>
            </div>
        </div>
    </section
    @endif
    

    <x-slot name="script">

    </x-slot>
</x-app-layout>
