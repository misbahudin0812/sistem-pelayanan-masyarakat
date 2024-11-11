<x-admin-layout>
    <h1 class="text-2xl font-bold">Cetak Laporan</h1>
                <div class="overflow-x-auto">
                    <table class="table">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Job</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row 1 -->
                            @for ($i = 0; $i < 2; $i++)
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar">
                                                <div class="mask mask-squircle w-12 h-12">
                                                    <img src="https://daisyui.com/tailwind-css-component-profile-2@56w.png"
                                                        alt="Avatar Tailwind CSS Component" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-bold">Hart Hagerty</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-ghost badge-sm">Desktop Support Technician</span>
                                    </td>
                                </tr>
                                <!-- row 2 -->
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar">
                                                <div class="mask mask-squircle w-12 h-12">
                                                    <img src="https://daisyui.com/tailwind-css-component-profile-3@56w.png"
                                                        alt="Avatar Tailwind CSS Component" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-bold">Brice Swyre</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-ghost badge-sm">Tax Accountant</span>
                                    </td>
                                </tr>
                                <!-- row 3 -->
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar">
                                                <div class="mask mask-squircle w-12 h-12">
                                                    <img src="https://daisyui.com/tailwind-css-component-profile-4@56w.png"
                                                        alt="Avatar Tailwind CSS Component" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-bold">Marjy Ferencz</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-ghost badge-sm">Office Assistant I</span>
                                    </td>
                                </tr>
                                <!-- row 4 -->
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar">
                                                <div class="mask mask-squircle w-12 h-12">
                                                    <img src="https://daisyui.com/tailwind-css-component-profile-5@56w.png"
                                                        alt="Avatar Tailwind CSS Component" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-bold">Yancy Tear</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-ghost badge-sm">Community Outreach Specialist</span>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                        <!-- foot -->
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Job</th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
</x-admin-layout>
