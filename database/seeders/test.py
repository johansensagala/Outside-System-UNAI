def generate_pattern(n):
    count = 1
    for i in range(1, n+1):
        for j in range(1, i+1):
            if count == j:
                print(j, end=" ")
            else:
                print("*", end=" ")
        print()
        count += 1

generate_pattern(20)