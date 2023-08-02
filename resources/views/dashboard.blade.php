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
                                @foreach($applications as $application)
                                <div class="rounded-xl border p-5 mt-3 shadow-md w-9/12 bg-white">
                                <div class="flex w-full items-center justify-between border-b pb-3">
                                  <div class="flex items-center space-x-3">
                                    <div class="text-lg font-bold text-slate-700">{{ $application->user->name }}</div>
                                  </div>
                                  <div class="flex items-center space-x-8">
                                    <button class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">#{{ $application->id }}</button>
                                    <div class="text-xs text-neutral-500">{{ $application->created_at }}</div>
                                  </div>
                                </div>
                            <div class="flex justify-between">
                                <div>
                                    <div class="mt-4 mb-6">
                                      <div class="mb-3 text-xl font-bold">{{ $application->subject }}</div>
                                      <div class="text-sm text-neutral-600">{{ $application->message }}</div>
                                    </div>
                                    <div>
                                      <div class="flex items-center justify-between text-slate-500">
                                          <a href="#">{{ $application->user->email }}</a>
                                      </div>
                                    </div>
                                </div>
                                @if(is_null($application->file_url))
                                    <div class="m-7 border p-3 rounded hover:bg-gray-50 transition cursor-pointer flex flex-col items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        No file
                                    </div>
                                @else
                                <div class="m-8 border p-6 rounded hover:bg-gray-50 transition cursor-pointer flex flex-col items-center">
                                    <a href="{{ asset('storage/'. $application->file_url) }}" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                    </a>
                                </div>
                                @endif
                              </div>
                                @if($application->answer()->exists())
                                        <hr class="border-b-5">
                                    <h3 class="font-bold mt-2">Answer</h3>
                                    <div class="mt-4 mb-6">
                                      <div class="text-sm text-neutral-600">{{ $application->answer->body }}</div>
                                    </div>
                                @else
                                    <div class="flex justify-end mr-4">
                                        <a href="{{ route('answer.create', ['application' => $application->id]) }}" class="border border-teal-500 bg-teal-500 text-white rounded-md px-3 py-1 m-2 transition duration-500 ease select-none hover:bg-teal-600 focus:outline-none focus:shadow-outline">
                                            Answer
                                        </a>
                                    </div>
                                @endif
                            </div>
                                @endforeach
                            </div>
                            {{ $applications->links() }}
                    @elseif(auth()->user()->role->name == 'client')

                        <span class="mt-3 text-black font-bold text-xl">Send Application</span>

                    @if(session()->has('error'))
                    <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div>
                            <span class="font-medium"></span>{{ session()->get('error') }}
                        </div>
                    </div>
                    @endif

                        <div class="mt-3">
                          <div class="mx-auto w-full max-w-[550px]">
                            <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                  <div class="mb-4">
                                        <label for="subject"  class="mb-3 block text-base font-medium text-[#07074D]">Subject</label>
                                        <input type="text" required name="subject" id="subject" placeholder="Enter your subject" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                                        <label for="message"  class="mb-3 block mt-3 text-base font-medium text-[#07074D]">Message</label>
                                        <textarea rows="3" required name="message" id="message" placeholder="Type your message" class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                                        <label for="subject" class="mb-3 mt-3 block text-base font-medium text-[#07074D]">File</label>
                                        <span  class="mb-2 block text-xs  text-[#07074D]">let the file type be docx, pdf</span>
                                        <input type="file" name="file"  id="file" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                                        @error('file')
                                            <p class="help-block text-danger">{{ $message }}</p>
                                        @enderror
                                  </div>
                                  <div class="flex">
                                      <button class="bg-gradient-to-b w-max mx-auto text-green-500 font-semibold from-slate-50 to-green-100 px-10 py-2 rounded-2xl shadow-green-400 shadow-md border-b-4 hover border-b border-green-200 hover:shadow-sm transition-all duration-500">
                                          Send
                                      </button>
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
