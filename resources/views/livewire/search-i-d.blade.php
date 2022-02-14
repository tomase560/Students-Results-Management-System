<div class="py-10">
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <div><img class="w-32 h-32" src="https://i1.wp.com/www.nul.ls/wp-content/uploads/2018/03/cropped-nul-icon.png?fit=240%2C240&ssl=1" alt=""></div>
    <br><br>
    <div class="text-xl font-medium leading-4 tracking-wider text-left text-gray-900">Enter student number:</div>
    <div><input class="rounded-md mt-2 border border-gray-300" type="text" wire:model="studID"></div>
    <br>
    
    @foreach ($student as $student)
        @if ($student['name'] != null)
            <p>Names: {{ $student['name'] }}</p>
        @endif
    @endforeach

    <br>
    @if ($courses != null)
        <div class="flex flex-row">
            <button wire:click="$toggle('showResults')" class="underline">Get results</button>
            <button wire:click="$toggle('showRecommendation')" class="ml-4 underline">Get recommendation</button>
        </div>
        
        <br>
        {{-- <button wire:click="$set('showRecommendation', true)">Get recommendation</button> --}}

        @if ($showResults)
            <div id="printcontent" class="flex flex-col mt-8">
                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-900 uppercase border-b border-gray-300 border-t border-gray-300 bg-gray-50">
                                        Course Code</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-900 uppercase border-b border-gray-300 border-t border-gray-300 bg-gray-50">
                                        Name</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-900 uppercase border-b border-gray-300 border-t border-gray-300 bg-gray-50">
                                        Mark (%)</th>
                                </tr>
                            </thead>

                            @foreach ($courses as $course)
                                <tbody class="bg-white">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium leading-5 text-gray-900">
                                                        <p>{{ $course['courseID'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                                            <div class="text-sm leading-5 text-gray-900"><p>{{ $course['name'] }}</p></div>
                                        </td>
                
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                                            <div class="text-sm leading-5 text-gray-900"><p>{{ $course['marks'] }}</p></div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        @endif
        
        <br> 

        @if ($showRecommendation)
            <div>
                <p class="text-md font-medium leading-4 tracking-wider text-left text-gray-900">Recommendation: {{ $recommendation }}</p>
            </div>
        @endif
        
        <div class="mt-2 flex justify-end">
            {{-- onclick="window.print()" --}}
                <button id="printBtn" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-md px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Print</button>
        </div>
    @endif    
    <script language='javascript'>
        document.getElementById('printBtn').addEventListener('click',()=>{  
        let title='PDF';
        let divId='pdf';
        let mywindow = window.open('', '', 'height=650,width=900,top=100,left=150');
        let printcontent = document.querySelector("#printcontent");

        mywindow.document.write('<html><body >');
        mywindow.document.write(printcontent.innerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        mywindow.close();

        return true;

        });
    </script> 

</div>
