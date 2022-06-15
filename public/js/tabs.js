const tabElements = [
    {
        id: 'in-progress',
        triggerEl: document.getElementById('in-progress-tab'),
        targetEl: document.getElementById('in-progress')
    },
    {
        id: 'completed',
        triggerEl: document.getElementById('completed-tab'),
        targetEl: document.getElementById('completed')
    }
];

// options with default values
const options = {
    defaultTabId: 'settings',
    activeClasses: 'text-red-200 hover:text-gray-600 dark:text-blue-500 dark:hover:text-blue-400 border-gray-600 dark:border-blue-500',
    inactiveClasses: 'text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300',
    onShow: () => {
        console.log('tab is shown');
    }
};
const tabs = new Tabs(tabElements, options);
