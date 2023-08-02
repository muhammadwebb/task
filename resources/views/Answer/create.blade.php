<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="text-xl font-semibold">Send Answer</h3>

                    <div class="mt-3">
                          <div class="mx-auto w-full max-w-[550px]">

                                <form action="{{ route('answer.store', ['application' => $application]) }}" method="post">
                                    @csrf
                                    <div class="mb-4 mt-3">
                                          <label for="message"  class="mb-3 block text-base font-medium text-[#07074D]">Message</label>
                                          <textarea rows="3" required name="message" id="message" placeholder="Type your message" class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                                          <div class="flex ">
                                                <button class="bg-gradient-to-b w-max mx-auto text-blue-500 font-semibold from-slate-50 to-blue-100 px-10 py-2 rounded-2xl shadow-blue-400 shadow-md border-b-4 hover border-b border-blue-200 hover:shadow-sm transition-all duration-500">Submit</button>
                                                <a href="{{ route('dashboard') }}" class="bg-gradient-to-b w-max mx-auto text-red-500 font-semibold from-slate-50 to-red-100 px-10 py-2 rounded-2xl shadow-red-400 shadow-md border-b-4 hover border-b border-red-200 hover:shadow-sm transition-all duration-500">Close</a>
                                          </div>
                                    </div>
                                </form>
                          </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </x-app-layout>
