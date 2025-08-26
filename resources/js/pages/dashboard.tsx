import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];

export default function Dashboard() {
  return (
    <div className="p-6 text-gray-900 dark:text-gray-100">
      <h1 className="text-3xl font-bold text-orange-500 mb-6">
        Dashboard Test Page ✅
      </h1>
    </div>
  );
}
