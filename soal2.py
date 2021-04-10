from itertools import chain
def partition(arr, low, high):
	i = (low-1)		 # index of smaller element
	pivot = arr[high]	 # pivot
	for j in range(low, high):
		if arr[j] <= pivot:
			i = i+1
			arr[i], arr[j] = arr[j], arr[i]

	arr[i+1], arr[high] = arr[high], arr[i+1]
	return (i+1)

def quickSort(arr, low, high):
	if len(arr) == 1:
		return arr
	if low < high:
		pi = partition(arr, low, high) 
		quickSort(arr, low, pi-1)
		quickSort(arr, pi+1, high)

arr = [["Keren"], ['D','W','B','T','A','S','U','D','M','O','Y','T','I','D'], ["Sekali "]]
arr[1] =["DUMBWAYSTODOIT"]
n = len(arr)
quickSort(arr, 0, n-1)
arr2= chain.from_iterable(arr)
print(*arr2)