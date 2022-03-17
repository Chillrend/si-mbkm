<section class="py-1 bg-blueGray-50">
    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        @if(isset($from_noreg) && $from_noreg == true)
            <a href="{{url("/")}}" class="underline text-sm font-bold uppercase text-lg py-4">
                Kembali ke Halaman Utama &#707;
            </a>
        @endif
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="rounded-t bg-white mb-0 px-6 py-6">
                <div class="text-center flex justify-between">
                    <h6 class="text-blueGray-700 text-xl font-bold">
                        Status Pendaftaran Kegiatan MBKM
                    </h6>
                    @if(!isset($from_noreg))
                        <a href="{{url("/mbkm/daftar")}}" class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                            Edit Data
                        </a>
                    @endif

                </div>
            </div>
            <div class="flex-auto bg-gray-100 px-4 lg:px-10 py-10 pt-0">
                <form>
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Informasi Mahasiswa
                    </h6>
                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Nama Lengkap
                                </label>
                                <input type="text" disabled class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$mhsw_mbkm->getMhsw()->first()->name}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Nomor Induk Mahasiswa
                                </label>
                                <input  disabled type="number" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$mhsw_mbkm->getMhsw()->first()->ident}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Jurusan
                                </label>
                                <input disabled type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$mhsw_mbkm->getProdi()->first()->getJurusan()->first()->jurusan_name}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Program Studi
                                </label>
                                <input disabled type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$mhsw_mbkm->getProdi()->first()->prodi_name}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Angkatan
                                </label>
                                <input disabled type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$mhsw_mbkm->angkatan}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Semester
                                </label>
                                <input disabled type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$mhsw_mbkm->semester}}">
                            </div>
                        </div>
                    </div>

                    <hr class="mt-6 border-b-1 border-blueGray-300">

                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Informasi Kegiatan MBKM
                    </h6>
                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    NIP Dosen Pembimbing (Pengajuan)
                                </label>
                                <input disabled type="number" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$mhsw_mbkm->nip_dospem}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Nama Dosen Pembimbing (Pengajuan)
                                </label>
                                <input disabled type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$mhsw_mbkm->nama_dospem}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Model Kegiatan MBKM
                                </label>
                                <input disabled type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$mhsw_mbkm->getModelMbkm()->first()->model_mbkm}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Durasi (Bulan)
                                </label>
                                <input disabled type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$mhsw_mbkm->durasi}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Lokasi Kegiatan MBKM
                                </label>
                                <input disabled type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$mhsw_mbkm->lokasi_mbkm}}">
                            </div>
                        </div>
                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Alamat Lokasi Kegiatan MBKM
                                </label>
                                <input disabled type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$mhsw_mbkm->alamat_mbkm}}">
                            </div>
                        </div>

                    </div>

                    <hr class="mt-6 border-b-1 border-blueGray-300">

                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Deskripsi
                    </h6>
                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Deskripsi / Lingkup Kegiatan yang akan dilakukan
                                </label>
                                <textarea disabled type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" rows="4">{{$mhsw_mbkm->deskripsi_mbkm}}</textarea>
                            </div>
                        </div>
                    </div>

                    <hr class="mt-6 border-b-1 border-blueGray-300">

                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Informasi Lainnya
                    </h6>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                No. Registrasi Kegiatan (Internal)
                            </label>
                            <input disabled type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{$mhsw_mbkm->id}}">
                        </div>
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                Sharable URL
                            </label>
                            <a class="block border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" href="{{url('/mbkm/noreg/' . $mhsw_mbkm->id)}}">{{url('/mbkm/noreg/' . $mhsw_mbkm->id)}}</a>
                        </div>
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                QR Code
                            </label>
                            <div id="qr" class="mb-3">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
