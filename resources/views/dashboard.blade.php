<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if(auth()->user()->role->name == 'manager')
                        <span class="text-black-500 font-bold text-xl">Received Applications</span>
                            <div class='mt-5'>
                                <div class="rounded-xl border p-5 mt-3 shadow-md w-9/12 bg-white">
                                <div class="flex w-full items-center justify-between border-b pb-3">
                                  <div class="flex items-center space-x-3">
                                    <div class="text-lg font-bold text-slate-700">Joe Smith</div>
                                  </div>
                                  <div class="flex items-center space-x-8">
                                    <button class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">ID</button>
                                    <div class="text-xs text-neutral-500">CREATED_AT</div>
                                  </div>
                                </div>

                                <div class="mt-4 mb-6">
                                  <div class="mb-3 text-xl font-bold">Nulla sed leo tempus, feugiat velit vel, rhoncus neque?</div>
                                  <div class="text-sm text-neutral-600">Aliquam a tristique sapien, nec bibendum urna. Maecenas convallis dignissim turpis, non suscipit mauris interdum at. Morbi sed gravida nisl, a pharetra nulla. Etiam tincidunt turpis leo, ut mollis ipsum consectetur quis. Etiam faucibus est risus, ac condimentum mauris consequat nec. Curabitur eget feugiat massa</div>
                                </div>

                                <div>
                                  <div class="flex items-center justify-between text-slate-500">
                                      <a href="#">manager@gmail.com</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        <div class='mt-5'>
                                <div class="rounded-xl border p-5 mt-3 shadow-md w-9/12 bg-white">
                                <div class="flex w-full items-center justify-between border-b pb-3">
                                  <div class="flex items-center space-x-3">
                                    <div class="text-lg font-bold text-slate-700">Joe Smith</div>
                                  </div>
                                  <div class="flex items-center space-x-8">
                                    <button class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">ID</button>
                                    <div class="text-xs text-neutral-500">CREATED_AT</div>
                                  </div>
                                </div>

                                <div class="mt-4 mb-6">
                                  <div class="mb-3 text-xl font-bold">Nulla sed leo tempus, feugiat velit vel, rhoncus neque?</div>
                                  <div class="text-sm text-neutral-600">Aliquam a tristique sapien, nec bibendum urna. Maecenas convallis dignissim turpis, non suscipit mauris interdum at. Morbi sed gravida nisl, a pharetra nulla. Etiam tincidunt turpis leo, ut mollis ipsum consectetur quis. Etiam faucibus est risus, ac condimentum mauris consequat nec. Curabitur eget feugiat massa</div>
                                </div>

                                <div>
                                  <div class="flex items-center justify-between text-slate-500">
                                      <a href="#">manager@gmail.com</a>
                                  </div>
                                </div>
                              </div>
                            </div>

                    @elseif(auth()->user()->role->name == 'client')

                        <span class="mt-3 text-black font-bold text-xl">Send Application</span>

                        <div class="mt-3">
                          <div class="mx-auto w-full max-w-[550px]">
                            <form action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                  <div class="mb-4">
                                        <label for="subject" class="mb-3 block text-base font-medium text-[#07074D]">Subject</label>
                                        <input type="text" name="subject" id="subject" placeholder="Enter your subject" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                                        <label for="message"  class="mb-3 block text-base font-medium text-[#07074D]">Message</label>
                                        <textarea rows="3" name="message" id="message" placeholder="Type your message" class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                                        <label for="subject" class="mb-3 block text-base font-medium text-[#07074D]">File</label>
                                        <input type="file" name="file" id="file" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                                  </div>
                                  <div class="items-center">
                                      <button class="bg-gradient-to-b w-max mx-auto text-blue-500 font-semibold from-slate-50 to-blue-100 px-10 py-2 rounded-2xl shadow-blue-400 shadow-md border-b-4 hover border-b border-blue-200 hover:shadow-sm transition-all duration-500">Fancy button</button>
                                  </div>
                            </form>
                          </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
