<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kampanye') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900">
                    <form action="{{ route('admin.campaigns.update', $campaign->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Judul Kampanye</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('title', $campaign->title) }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="description" id="description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>{{ old('description', $campaign->description) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Gambar Kampanye (Ganti)</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full text-sm">
                            @if($campaign->image)
                                <img src="{{ asset('storage/' . $campaign->image) }}" alt="Gambar saat ini" class="mt-2 w-32 h-auto rounded-lg shadow-md">
                            @endif
                        </div>
                        <div class="mb-4">
                            <label for="target_amount" class="block text-sm font-medium text-gray-700">Target Donasi (Rp)</label>
                            <input type="number" name="target_amount" id="target_amount" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('target_amount', $campaign->target_amount) }}" required>
                        </div>
                        <div class="mb-4">
                             <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                             <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                 <option value="pending" @selected($campaign->status == 'pending')>Pending</option>
                                 <option value="approved" @selected($campaign->status == 'approved')>Approved</option>
                                 <option value="rejected" @selected($campaign->status == 'rejected')>Rejected</option>
                                 <option value="completed" @selected($campaign->status == 'completed')>Completed</option>
                             </select>
                        </div>

                        <div x-data="{
                            paymentMethods: {{ json_encode(old('payment_methods', $campaign->paymentMethods->map->only(['type', 'name', 'account_holder_name', 'account_details'])->toArray())) }},
                            banks: {{ json_encode(config('payment_options.banks')) }},
                            ewallets: {{ json_encode(config('payment_options.ewallets')) }},
                            addMethod() { this.paymentMethods.push({ type: 'bank', name: 'BCA', account_holder_name: '', account_details: '' }); },
                            removeMethod(index) { if (this.paymentMethods.length > 1) { this.paymentMethods.splice(index, 1); } }
                        }" class="mt-6 border-t pt-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Metode Pembayaran</h3>
                            <template x-for="(method, index) in paymentMethods" :key="index">
                                <div class="p-4 mb-4 border rounded-md relative bg-gray-50 shadow-sm">
                                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Tipe</label>
                                            <select :name="'payment_methods[' + index + '][type]'" x-model="method.type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                                <option value="bank">Bank</option>
                                                <option value="ewallet">E-Wallet</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Nama</label>
                                            <select :name="'payment_methods[' + index + '][name]'" x-model="method.name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                                <template x-if="method.type === 'bank'"><template x-for="(bankName, bankCode) in banks"><option :value="bankCode" x-text="bankName"></option></template></template>
                                                <template x-if="method.type === 'ewallet'"><template x-for="(ewalletName, ewalletCode) in ewallets"><option :value="ewalletCode" x-text="ewalletName"></option></template></template>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Atas Nama</label>
                                            <input type="text" :name="'payment_methods[' + index + '][account_holder_name]'" x-model="method.account_holder_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Nama Pemilik Rekening" required>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">No. Rekening / Telepon</label>
                                            <input type="text" :name="'payment_methods[' + index + '][account_details]'" x-model="method.account_details" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Nomor Rekening/Telepon" required>
                                        </div>
                                    </div>
                                    <button type="button" @click="removeMethod(index)" x-show="paymentMethods.length > 1" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full h-6 w-6 flex items-center justify-center font-bold">&times;</button>
                                </div>
                            </template>
                            <button type="button" @click="addMethod()" class="mt-2 inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300">+ Tambah Metode</button>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                             <a href="{{ route('admin.campaigns.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500">Update Kampanye</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>