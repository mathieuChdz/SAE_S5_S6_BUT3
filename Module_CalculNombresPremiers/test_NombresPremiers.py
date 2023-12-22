import subprocess
import unittest

command = ["mpiexec", "-n", "4", "--host", "node1,node2,node3,node4", "python3", "nombres_Premiers.py", None]

class ClasseDeTest(unittest.TestCase):

    def test_simple(self):
        command[7]="-1"
        out = subprocess.run(command, capture_output=True, text=True)
        self.assertEqual(out.stdout.rstrip(), "[]")
        command[7]="0"
        out = subprocess.run(command, capture_output=True, text=True)
        self.assertEqual(out.stdout.rstrip(), "[]")
        command[7]="1"
        out = subprocess.run(command, capture_output=True, text=True)
        self.assertEqual(out.stdout.rstrip(), "[]")
        command[7]="2"
        out = subprocess.run(command, capture_output=True, text=True)
        self.assertEqual(out.stdout.rstrip(), "[2]")
        command[7]="35"
        out = subprocess.run(command, capture_output=True, text=True)
        self.assertEqual(out.stdout.rstrip(), "[2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31]")
        command[7]="472"
        out = subprocess.run(command, capture_output=True, text=True)
        self.assertEqual(out.stdout.rstrip(), "[2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103, 107, 109, 113, 127, 131, 137, 139, 149, 151, 157, 163, 167, 173, 179, 181, 191, 193, 197, 199, 211, 223, 227, 229, 233, 239, 241, 251, 257, 263, 269, 271, 277, 281, 283, 293, 307, 311, 313, 317, 331, 337, 347, 349, 353, 359, 367, 373, 379, 383, 389, 397, 401, 409, 419, 421, 431, 433, 439, 443, 449, 457, 461, 463, 467]")


if __name__ == '__main__':
    unittest.main()
